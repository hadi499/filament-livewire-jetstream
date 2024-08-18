<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category as ModelsCategory;


class PostCategory extends Component
{

    public $category;
    public $posts;


    public function mount($slug)
    {
        $this->category = ModelsCategory::where('slug', $slug)->firstOrFail();

        $this->posts = $this->category->posts;
    }

    public function render()
    {
        return view('livewire.post-category', [
            'posts' => $this->posts
        ]);
    }
}
