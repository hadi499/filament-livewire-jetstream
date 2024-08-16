<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function show(Post $post)
    {
        return view(
            'dashboard.show',
            [
                'post' => $post
            ]
        );
    }

    public function create()
    {
        return view('dashboard.create');
    }

    public function edit(Post $post)
    {

        return view('dashboard.edit', [
            'slug' => $post->slug
        ]);
    }

    public function destroy(Post $post)
    {

        if ($post->image) {
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return redirect('dashboard')->with('success', 'post has been deleted!');
    }
}
