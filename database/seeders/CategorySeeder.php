<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Category::query()->truncate();

        $data = ['Thời sự' , 'Kinh doanh', 'Khoa học', 'Giải trí',
         'Thể thao', 'Pháp luật', 'Giáo dục', 'Sức khỏe', 'Đời sống'];
        foreach ($data as  $item) {
            Category::query()->create([
                'name' => $item,
                'slug' => Str::slug($item),
            ]);
        }
    }
}
