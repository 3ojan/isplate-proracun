<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{
    public function getImage($filename)
    {
        $path = public_path('image/' . $filename);
        if (!file_exists($path)) {
            abort(404);
        }

        $response = Response::file($path);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization');

        return $response;
    }
}
