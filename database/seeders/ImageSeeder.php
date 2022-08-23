<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Organization;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image = Image::first();
        if (!$image) {
            $this->command->line("Generating Images");

            $this->command->line("Generating images for all posts");
            $posts = Post::get();
            $posts->each(function($post, $key) {
                $images = ['1d13cff2ef71a8d9101402d67e0efaf2fa3ce2a0.jpg',
                    '04c53d9a4fe33477cdda2e8adafa037cad48b394.jpg',
                    '201fa2996af3beefd2f98eeee59ad1f22f43bc07.jpg',
                    '202208181924IMG_1187.jpg',
                    '202208181927IMG_1187.jpg',
                    'cce4ba968a8e04630ba0d2821442b15756e075cd.jpg',
                    'e31dd7510061e1777c4f18f791dbf3bdff230268.jpg',
                    'e092a50b2afae4ecf1fb595d8d52942b2a485ec4.jpg'
                ];

                $image = new Image();
                $image->url = collect($images)->random();
                $image->post_id = $post->id;
                $image->save();

                $post->images()->save($image);
            });
        }
    }
}
