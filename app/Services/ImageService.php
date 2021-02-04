<?php

namespace App\Services;

use App\Image;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ImageService
{
    /**
     * @param Request $request
     * @return Collection
     */
    public function getFilteredImagesWithLimit(Request $request): Collection
    {
        $start = $request->get("start");
        $rowperpage = $request->get("length");
        $search = $request->get('search');

        return Image::with('user')
            ->filter(['name' => $search['value']])
            ->skip($start)
            ->take($rowperpage)
            ->get();
    }

    /**
     * @return int
     */
    public function allImagesCount(): int
    {
        return Image::with('user')->count();
    }

    /**
     * @param Request $request
     * @return int
     */
    public function filteredImagesCount(Request $request): int
    {
        $search = $request->get('search');

        return Image::with('user')
            ->filter(['name' => $search['value']])->count();
    }
}
