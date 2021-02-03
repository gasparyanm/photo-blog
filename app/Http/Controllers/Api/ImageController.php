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

        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $totalImages = Image::with('user')
            ->filter(['name' => $filterParams['value']])->count();
        $totalImagesWithFilter = Image::with('user')
            ->filter(['name' => $filterParams['value']])->count();

        $images = Image::with('user')
            ->filter(['name' => $filterParams['value']])
            ->skip($start)
            ->take($rowperpage)
            ->get();

        return array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalImages,
            "iTotalDisplayRecords" => $totalImagesWithFilter,
            "aaData" => ImageResource::collection($images)
        );
    }
}
