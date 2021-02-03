<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImageResource;
use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(Request $request)
    {
        $filterParams = $request->all()['search'];

        $images = Image::with('user')
            ->filter(['name' => $filterParams['value']])->paginate();

        return ImageResource::collection($images);
    }
}
