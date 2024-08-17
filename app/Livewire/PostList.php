<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class PostList extends Component
{
    use WithPagination;

    #[Url()]
    public $search = '';

    public function setSort($sort)
    {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
    }

    #[Computed()]
    public function posts()
    {
        return  Post::where('user_id', auth()->user()->id)
            ->where('title', 'like', "%{$this->search}%")
            ->latest()->paginate(5);
    }


    public function render()
    {
        return view('livewire.post-list', [
            // 'posts' => Post::query()->with('author')->latest()->get()

        ]);
    }
}
