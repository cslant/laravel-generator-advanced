<?php

namespace TanHongIT\LaravelGenerator\Http\Controllers\Generator;

use Str;
use TanHongIT\LaravelGenerator\Http\Controllers\Detect\DetectController;
use TanHongIT\LaravelGenerator\Http\Requests\Generator\RepositoryGeneratorRequest;

class RepositoryGeneratorController extends GeneratorController
{
    protected DetectController $detectController;

    public function __construct(
        DetectController $detectController
    ) {
        $this->detectController = $detectController;
    }

    public function index()
    {
        $this->generateRepository('user');
    }

    /**
     * @param $modelName
     * @return void
     */
    public function generateRepository($modelName)
    {
        $modelName = Str::studly($modelName);
        $fileName = "{$modelName}Repository.php";

        $fileContent = "<?php\n\nnamespace App\Repositories;\n\nuse App\\Models\\$modelName;\n\nclass {$modelName}Repository\n{\n    protected \$model;\n\n    public function __construct($modelName \$model)\n    {\n        \$this->model = \$model;\n    }\n\n    // các phương thức truy vấn\n}";

        $this->saveFile($fileName, $fileContent);
    }

    /**
     * @param $fileName
     * @param $fileContent
     * @return void
     */
    public function saveFile($fileName, $fileContent)
    {
        $filePath = app_path("Repositories/{$fileName}");

       if(!is_dir(dirname($filePath))) {
           mkdir(dirname($filePath), 0777, true);
       }

        file_put_contents($filePath, $fileContent);
    }
}
