<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function postsCategory(string $id)
    {
        $posts = Post::where('category_id', $id)
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'message' => 'Dữ liệu tin theo loại',
            'data' => $posts
        ]);
    }
    public function detail(string $id)
    {
        $posts = Post::where('id', $id)
            ->where('is_active', true)
            ->first();

        return response()->json([
            'message' => 'Chi tiết tin số ' . $posts->id,
            'data' => $posts
        ]);
    }
}
