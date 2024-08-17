<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class HomePage extends Component
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
        return  Post::where('title', 'like', "%{$this->search}%")
            ->latest()->paginate(6);
    }

    public function render()
    {
        return view('livewire.home-page', [
            // 'posts' => Post::latest()->paginate(6)
        ]);
    }
}
