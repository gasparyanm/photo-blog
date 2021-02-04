<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImageResource;
use App\Image;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * @param Request $request
     * @param ImageService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, ImageService $service)
    {
        $totalImages = $service->allImagesCount();
        $totalImagesWithFilter = $service->filteredImagesCount($request);
        $images = $service->getFilteredImagesWithLimit($request);

        return response()->json([
            "draw" => intval($request->get('draw')),
            "iTotalRecords" => $totalImages,
            "iTotalDisplayRecords" => $totalImagesWithFilter,
            "aaData" => ImageResource::collection($images)
        ], 200);
    }
}
