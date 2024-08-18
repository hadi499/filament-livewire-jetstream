<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {

        return view('home.index');
    }

    public function show(Post $post)
    {
        return view(
            'home.show',
            [
                'slug' => $post->slug
            ]
        );
    }

    public function postCategory(Category $category)
    {
        return view('home.category', [
            'slug' => $category->slug
        ]);
    }
}
