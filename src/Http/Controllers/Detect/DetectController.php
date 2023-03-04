<?php

namespace TanHongIT\LaravelGenerator\Http\Controllers\Detect;

use Illuminate\Routing\Controller;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ReflectionClass;
use ReflectionMethod;

class DetectController extends Controller
{
    /**
     * @param $file
     *
     * @return ReflectionClass|null
     */
    public function getClassFromFile($file)
    {
        $content = file_get_contents($file);
        $matches = [];

        // Match namespace and class name
        preg_match('/namespace\s+(.*?);.*?class\s+(\w+)/s', $content, $matches);
        if (!isset($matches[1]) || !isset($matches[2])) {
            return null;
        }

        $namespace = $matches[1];
        $class = $namespace . '\\' . $matches[2];

        return class_exists($class) ? new ReflectionClass($class) : null;
    }

    /**
     * @param ReflectionClass $class
     *
     * @return bool
     */
    private function dependsOnModels(ReflectionClass $class)
    {
        $dependencies = $class->getConstructor()->getParameters();
        foreach ($dependencies as $dependency) {
            if (preg_match('/Model$/', $dependency->getClass()->getName()) === 1) {
                return true;
            }
        }
        return false;
    }

    /**
     * Check if the class implements the CRUD methods
     *
     * @param ReflectionClass $class
     *
     * @return bool
     */
    protected function implementsCrudMethods(ReflectionClass $class)
    {
        $methods = $class->getMethods(ReflectionMethod::IS_PUBLIC);
        $crudMethods = [
            'create',
            'read',
            'update',
            'delete'
        ];

        foreach ($methods as $method) {
            if (in_array($method->name, $crudMethods)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if the class is a repository class
     * A repository class must have a name ending with "Repository" or "EloquentRepository"
     * and implement the CRUD methods
     * and have a dependency on a model
     *
     * @param ReflectionClass $class
     *
     * @return bool
     */
    public function isRepositoryClass(ReflectionClass $class)
    {
        return $this->checkClassType($class, 'repository');
    }

    /**
     * Check if the class is a service class
     * A service class must have a name ending with "Service" or "EloquentService"
     *
     * @param ReflectionClass $class
     *
     * @return bool
     */
    public function isServiceClass(ReflectionClass $class)
    {
        return $this->checkClassType($class, 'service');
    }

    /**
     * Check if the class is a controller class
     * A controller class must have a name ending with "Controller" or "EloquentController"
     * and implement the CRUD methods
     * and have a dependency on a model
     *
     * @param ReflectionClass $class
     *
     * @return bool
     */
    public function isControllerClass(ReflectionClass $class)
    {
        return $this->checkClassType($class, 'controller');
    }

    /**
     * Check if the class is an action class
     * An action class must have a name ending with "Action" or "EloquentAction"
     *
     * @param ReflectionClass $class
     *
     * @return bool
     */
    public function isActionClass(ReflectionClass $class)
    {
        return $this->checkClassType($class, 'action');
    }

    /**
     * Check if the class is a class of the given type
     * A class of the given type must have a name ending with the given type or "Eloquent" + the given type
     *
     * @param ReflectionClass $class
     * @param $type
     *
     * @return bool
     */
    protected function checkClassType(ReflectionClass $class, $type)
    {
        $type = ucfirst($type);
        return preg_match('/' . $type . '$/', $class->getName()) === 1
            || preg_match('/Eloquent' . $type . '$/', $class->getName()) === 1
            && $this->implementsCrudMethods($class)
            && $this->dependsOnModels($class);
    }

    /**
     * Get the type of the given class
     *
     * @param ReflectionClass $class
     *
     * @return string
     */
    protected function getClassType(ReflectionClass $class)
    {
        $type = 'other';

        switch (true) {
            case $this->isRepositoryClass($class):
                $type = 'repository';
                break;
            case $this->isServiceClass($class):
                $type = 'service';
                break;
            case $this->isControllerClass($class):
                $type = 'controller';
                break;
            case $this->isActionClass($class):
                $type = 'action';
                break;
        }

        return $type;
    }

    /**
     * Get the type of all classes in the app folder
     *
     * @return array[]
     */
    public function detect()
    {
        $recursiveDirectoryIterator = new RecursiveDirectoryIterator(app_path());
        $files = new RecursiveIteratorIterator($recursiveDirectoryIterator);
        $type = [];

        foreach ($files as $file) {
            if (!$file->isFile() || $file->getExtension() !== 'php') {
                continue;
            }

            $class = $this->getClassFromFile($file);
            if ($class !== null) {
                $type[] = $this->getClassType($class);
            }
        }

        return $type;
    }
}
