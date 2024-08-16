<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostList extends Component
{
    public function render()
    {
        return view('livewire.post-list', [
            // 'posts' => Post::query()->with('author')->latest()->get()
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }
}
