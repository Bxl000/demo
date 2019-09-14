<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{
    protected $table = 'thumbnail';

    public function article()
    {
        return $this->belongsTo(Article::class, 'thumbnail_id', 'id');
    }
}
