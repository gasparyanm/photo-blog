<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class Image extends Model
{
    use Filterable;

    protected $fillable = [
        'title',
        'path',
        'user_id'
    ];

    protected $casts = [
        'title' => 'string',
        'path' => 'string',
        'user_id' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
