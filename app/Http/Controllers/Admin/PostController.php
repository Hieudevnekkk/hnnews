<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    const PATH_VIEW = 'admin.posts.';
    const PATH_UPLOAD = 'posts';

    public function index()
    {
        $categories = Category::query()->pluck('name', 'id');
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('categories', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentCategories = Category::query()->with('children')->whereNull('parent_id')->get();

        return view(self::PATH_VIEW . __FUNCTION__, compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = Storage::put(self::PATH_UPLOAD, $data['image']);
        }

        Post::query()->create($data);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Post::query()->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Post::query()->findOrFail($id);

        $parentCategories = Category::query()->with('children')->whereNull('parent_id')->get();

        return view(self::PATH_VIEW . __FUNCTION__, compact('model', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $model = Post::query()->findOrFail($id);

        // Gán các dữ liệu của request ngoại trừ trường image
        $data = $request->except('image');

        $data['is_active'] ??= 0;
        $data['is_hot'] ??= 0;
        $data['is_featured'] ??= 0;
        $data['is_most_popular'] ??= 0;
        $data['is_trending'] ??= 0;

        if ($request->hasFile('image')) {
            $data['image'] = Storage::put(self::PATH_UPLOAD, $request->file('image'));
        }

        $imageOld = $model->image;

        $model->update($data);

        if ($request->hasFile('image') && $imageOld && Storage::exists($imageOld)) {
            Storage::delete($imageOld);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Post::query()->findOrFail($id);

        $model->delete();

        if ($model->image && Storage::exists($model->image)) {
            Storage::delete($model->image);
        }

        return back();
    }
}
