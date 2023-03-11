<?php

namespace TanHongIT\LaravelGenerator\Http\Controllers\Asset;

use DateTime;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class AssetController extends BaseController
{
    /**
     * @param Request $request
     *
     * @return string
     */
    public function index(Request $request)
    {
        $fileSystem = new Filesystem();
        $asset = $request->offsetGet('asset');

        try {
            $path = laravel_generator_dist_path($asset);

            return (new Response(
                $fileSystem->get($path),
                200,
                [
                    'Content-Type' => (pathinfo($asset))['extension'] == 'css'
                        ? 'text/css'
                        : 'application/javascript',
                ]
            ))->setSharedMaxAge(31536000)
                ->setMaxAge(31536000)
                ->setExpires(new DateTime('+1 year'));
        } catch (FileNotFoundException $e) {
            return $e->getMessage();
        }
    }
}
