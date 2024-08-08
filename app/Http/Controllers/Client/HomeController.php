<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    const PATH_VIEW = 'client.';

    private $categories;

    private $newsPosts12MinutesAgo;

    public function __construct()
    {
        $this->categories = Category::query()->with('children')->whereNull('parent_id')->get();

        $currentDateTime = Carbon::now();

        $dateTime12MinutesAgo = $currentDateTime->subMinutes(12);

        $this->newsPosts12MinutesAgo = Post::select('title')
            ->where('is_active', true)
            ->where('created_at', '>=', $dateTime12MinutesAgo)
            ->get();
    }

    public function index()
    {
        $categories = $this->categories;

        $newsPosts12MinutesAgo = $this->newsPosts12MinutesAgo;

        $post_news = Post::where('is_active', true)
            ->latest('id')
            ->limit(5)
            ->get();

        $post_category = [];

        foreach ($categories as $key => $category) {

            $post_category[$category->name] = Post::whereBelongsTo($category)
                ->where('is_active', true)
                ->latest('id')
                ->limit(5)
                ->get();

            if ($key == 4) {
                break;
            }
        }
        return view(self::PATH_VIEW . __FUNCTION__, compact('post_news', 'newsPosts12MinutesAgo', 'categories', 'post_category'));
    }
    public function category(string $slug)
    {

        $categories = $this->categories;

        $newsPosts12MinutesAgo = $this->newsPosts12MinutesAgo;

        $category = Category::where('slug', $slug)->first();

        $nameCategory = $category->name;

        $posts = Post::where('category_id', $category->id)
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return view(self::PATH_VIEW . __FUNCTION__, compact('categories', 'newsPosts12MinutesAgo', 'posts', 'nameCategory'));
    }
    public function detail(string $slug)
    {

        $categories = $this->categories;

        $newsPosts12MinutesAgo = $this->newsPosts12MinutesAgo;

        $post = Post::where('slug', $slug)
            ->where('is_active', true)
            ->first();

        $views = $post->views + 1;

        Post::where('id', $post->id)->update([
            'views' => $views
        ]);

        $post_same_kind = Post::where('category_id', $post->category_id)
            ->whereNotIn('id', [$post->id])
            ->limit(4)
            ->get();

        $comments = Comment::whereBelongsTo($post)
            ->where('is_active', true)
            ->get();

        return view(self::PATH_VIEW . __FUNCTION__, compact('categories', 'newsPosts12MinutesAgo', 'post', 'post_same_kind', 'comments'));
    }
    public function search(Request $request)
    {

        $categories = $this->categories;

        $newsPosts12MinutesAgo = $this->newsPosts12MinutesAgo;

        $keySearch = $request->search;

        $posts = Post::where('title', 'like', '%' . $keySearch . '%')
            ->where('is_active', true)
            ->get();

        return view('client.search', compact('categories', 'newsPosts12MinutesAgo', 'keySearch', 'posts'));
    }
}
