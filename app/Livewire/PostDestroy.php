<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class PostDestroy extends Component
{
    public $post;

    public $delete;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function confirmDelete() {}



    public function destroy()
    {
        // if ($this->post->image) {
        //     Storage::delete($this->post->image);
        // }
        $this->post->delete();
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.post-destroy');
    }
}
