<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = Tag::first();
        if (!$tag) {
            $this->command->line("Generating Tags");
            $tags = ['ความสะอาด', 'ขยะ', 'ไฟฟ้า', 'ประปา', 'ไฟถนนเสีย', 'ถนน', 'ทางเท้า', 'อาคารสถานที่ชำรุด',
                    'อุปกรณ์ครุภัณฑ์ชำรุด', 'จุดเสี่ยง', 'น้ำท่วม', 'ไฟไหม้', 'เผาไหม้', 'ต้นไม้', 'กลิ่น', 'เสียง', 'สัตว์',
                    'ความช่วยเหลือ', 'สุขภาพ', 'เบาะแสทุจริต', 'อื่นๆ'
                ];
            collect($tags)->each(function ($tag_name, $key) {
                $tag = new Tag();
                $tag->name = $tag_name;
                $tag->save();
            });
        }

        $this->command->line("Generating tags for all posts");
        $posts = Post::get();
        $posts->each(function($post, $key) {
            $n = fake()->numberBetween(1, 5);
            $tag_ids = Tag::inRandomOrder()->limit($n)->get()->pluck(['id'])->all();
            $post->tags()->sync($tag_ids);
        });
    }
}
