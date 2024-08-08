<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Post::query()->truncate();
        
        for ($i = 0; $i < 100; $i++) {
            $title = fake()->text(100);
            $sub_title = fake()->text(110);
            $content = fake()->text(1000);
            $name_author = fake()->text(20);
            Post::query()->create([
                'category_id' => rand(1,9),
                'title' => $title,
                'slug' => Str::slug($title) . '-' . Str::random(8),
                'sub_title' => $sub_title,
                'image' => 'https://i1-vnexpress.vnecdn.net/2024/07/17/dfqror7owzulq5fa6rba5fjf7no9zn-8630-6772-1721184144.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=-hNDbWnVJHwxqvkeT2mUSA',
                'content' => $content,
                'name_author' => $name_author
            ]);
        }
    }
}
