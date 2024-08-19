<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\Comment as CommentModel;
use Illuminate\Support\Facades\Auth;

class Comment extends Component
{
    public $comment;
    public $post;
    public $body;
    public $comment_id;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function redirectToLogin()
    {
        return redirect()->route('login');
    }

    public function store()
    {
        $this->validate(['body' => 'required']);
        $comment = CommentModel::create([
            'user_id' => Auth::user()->id,
            'post_id' => $this->post->id,
            'body' => $this->body
        ]);

        $this->body = NULL;
    }

    public function render()
    {
        $comments = CommentModel::with('user', 'childrens')
            ->where('post_id', $this->post->id)
            ->whereNull('comment_id')
            ->orderBy('created_at', 'desc')
            ->get();

        $total_comment = CommentModel::where('post_id', $this->post->id)->count();
        return view('livewire.comment', [
            'comments' => $comments,
            'total_comment' => $total_comment
        ]);
    }
}
