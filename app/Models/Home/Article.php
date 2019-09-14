<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';

    protected $fillable =[
        'id', 'title', 'content', 'tag', 'author', 'viewnumber', 'comment', 'thumbnail_id', 'create_at'
    ];

    //和缩略图创建关联
    public function thumbnail()
    {
        return $this->hasOne(Thumbnail::class, 'id', 'thumbnail_id');
    }
}
