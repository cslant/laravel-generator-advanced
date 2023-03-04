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
        $namespace = $class = $implements = null;
        $tokens = token_get_all(file_get_contents($file));
        $count = count($tokens);

        for ($i = 2; $i < $count; $i++) {
            if (isset($tokens[$i - 2][0]) && $tokens[$i - 2][0] === T_NAMESPACE && $tokens[$i - 1][0] === T_WHITESPACE && ($tokens[$i][0] === T_NAME_QUALIFIED || $tokens[$i][0] === T_STRING || $tokens[$i][0] === T_NS_SEPARATOR)) {
                $namespace = '';
                for ($j = $i; $j < $count; $j++) {
                    if ($tokens[$j] === ';') {
                        break;
                    }
                    $namespace .= is_array($tokens[$j]) ? $tokens[$j][1] : $tokens[$j];
                }
            }

            $classConditions = isset($tokens[$i - 4][0]) && $tokens[$i - 4][0] === T_CLASS && $tokens[$i - 3][0] === T_WHITESPACE && $tokens[$i - 2][0] === T_STRING && $tokens[$i - 1][0] === T_WHITESPACE;
            if ($classConditions && $tokens[$i][0] === T_EXTENDS) {
                $class = $tokens[$i - 2][1];
                for ($j = $i + 3; $j < $count; $j++) {
                    if ($tokens [$j] === '{') {
                        break;
                    } elseif ($tokens[$j] === ',') {
                        $implements [] = $tokens[$j + 2][1];
                    }
                }
            } elseif ($classConditions && $tokens[$i][0] === T_IMPLEMENTS) {
                $class = $tokens[$i - 2][1];
                for ($j = $i + 2; $j < $count; $j++) {
                    if ($tokens[$j] === '{') {
                        break;
                    } elseif ($tokens[$j] === ',') {
                        $implements [] = $tokens[$j + 2][1];
                    }
                }
            } elseif (isset($tokens[$i - 2][0]) && $tokens[$i - 2][0] === T_CLASS && $tokens[$i - 1][0] === T_WHITESPACE && $tokens[$i][0] === T_STRING) {
                $class = $tokens[$i][1];
            }
        }

        if ($class !== null) {
            $class = $namespace . '\\' . $class;

            return class_exists($class) ? new ReflectionClass($class) : null;
        }

        return null;
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

        foreach ($crudMethods as $method) {
            foreach ($methods as $m) {
                if (strtolower($m->getName()) === $method) {
                    return true;
                }
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
     * @param ReflectionClass $class
     *
     * @return bool
     */
    public function isServiceClass(ReflectionClass $class)
    {
        return $this->checkClassType($class, 'service');
    }

    /**
     * @param ReflectionClass $class
     *
     * @return bool
     */
    public function isControllerClass(ReflectionClass $class)
    {
        return $this->checkClassType($class, 'controller');
    }

    /**
     * @param ReflectionClass $class
     *
     * @return bool
     */
    public function isActionClass(ReflectionClass $class)
    {
        return $this->checkClassType($class, 'action');
    }

    /**
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

    protected function getClassType(ReflectionClass $class)
    {
        if ($this->isRepositoryClass($class)) {
            return 'repository';
        }
        if ($this->isServiceClass($class)) {
            return 'service';
        }
        if ($this->isControllerClass($class)) {
            return 'controller';
        }
        if ($this->isActionClass($class)) {
            return 'action';
        }
        return 'other';
    }

    /**
     * Get the total number of repositories in the application.
     *
     * @return array[]
     */
    public function detect()
    {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(app_path()));
        $type = [];

        foreach ($files as $file) {
            if ($file->isFile() && $file->getExtension() === 'php') {
                $class = $this->getClassFromFile($file);
                if ($class !== null) {
                    $type[] = $this->getClassType($class);
                }
            }
        }

        return $type;
    }
}

