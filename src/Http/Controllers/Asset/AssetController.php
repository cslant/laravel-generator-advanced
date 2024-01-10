<?php

namespace CSlant\LaraGenAdv\Http\Controllers\Asset;

use DateTime;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class AssetController extends BaseController
{
    /**
     * @param  Request  $request
     *
     * @return Response
     */
    public function index(Request $request): Response
    {
        $fileSystem = new Filesystem();
        $asset = $request->offsetGet('asset');

        try {
            $path = lara_gen_adv_dist_path($asset);

            return (new Response(
                $fileSystem->get($path),
                200,
                [
                    'Content-Type' => pathinfo($asset, PATHINFO_EXTENSION) == 'css'
                        ? 'text/css'
                        : 'application/javascript',
                ]
            ))->setSharedMaxAge(31536000)
                ->setMaxAge(31536000)
                ->setExpires(new DateTime('+1 year'));
        } catch (FileNotFoundException $e) {
            return new Response($e->getMessage(), 404);
        }
    }
}
