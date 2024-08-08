<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Comment::query()->truncate();

        for ($i=0; $i < 1000; $i++) { 
            $name = fake()->text(30);
            $avatar = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqqKM1x-MalbSkvAyho1uBb3dfFaaOh01_kw&usqp=CAU";
            $email = "hihi". $i ."@gmail.com";
            $content = fake()->text(70);
            Comment::query()->create([
                'post_id' => rand(0,100),
                'name' => $name,
                'avatar' => $avatar,
                'email' => $email,
                'content' => $content,]);
        }

    }
}
