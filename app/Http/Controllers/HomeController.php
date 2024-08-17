<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
                'post' => $post
            ]
        );
    }
}
