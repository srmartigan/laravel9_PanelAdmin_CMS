<?php

namespace App\Http\Controllers;

use http\Env;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $url = Storage::put('images', $request->file('upload'));
        return response()->json(
            [
                'success' => true,
                'url' => env("APP_URL")."/storage/".$url,
            ]);
    }
}
