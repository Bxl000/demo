<?php

use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Home\Article::class)->times(500)->make()->each(function ($model) {
            // 数据入库
            $model->save();
        });
    }
}
