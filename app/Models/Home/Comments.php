<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';

    public function article()
    {
        return $this->hasOne(Article::class, 'id', 'article_id');
    }
}
