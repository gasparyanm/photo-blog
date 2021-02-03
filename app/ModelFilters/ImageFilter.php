<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ImageFilter extends ModelFilter
{
    public function name($name) {
        return $this->whereHas('user', function($query) use ($name)
        {
            return $query->where('name', 'like', "%$name%");
        });
    }
}
