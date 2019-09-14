<?php

use Illuminate\Database\Seeder;

use App\Models\Home\Thumbnail;

class ThumbnailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Thumbnail::class)->times(500)->make()->each(function ($modal){
            $modal->save();
        });
    }
}
