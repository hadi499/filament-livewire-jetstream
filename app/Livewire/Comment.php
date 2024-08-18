<?php

namespace App\Livewire;

use App\Models\Like;
use App\Models\Post;
use Livewire\Component;
use App\Models\Comment as Komen;
use Illuminate\Support\Facades\Auth;

class Comment extends Component
{
    public $comment;
    public $post;

    public $body;
    public $body2;
    public $comment_id;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    // public function mount($id)
    // {
    //     $this->post = Post::find($id);
    // }



    public function store()
    {
        $this->validate(['body' => 'required']);
        $comment = Komen::create([
            'user_id' => Auth::user()->id,
            'post_id' => $this->post->id,
            'body' => $this->body
        ]);

        $this->body = NULL;


        // return redirect()->route('posts.show', $this->post->slug);
    }

    public function selectReply($id)
    {

        $this->comment_id = $id;
        $this->body2 = NULL;
    }

    public function reply()
    {
        $this->validate(['body2' => 'required']);
        $comment = Komen::find($this->comment_id);
        $comment = Komen::create([
            'user_id' => Auth::user()->id,
            'post_id' => $this->post->id,
            'body' => $this->body2,
            'comment_id' => $comment->comment_id ? $comment->comment_id : $comment->id
        ]);

        $this->body2 = NULL;
        $this->comment_id = NULL;
        // return redirect()->route('posts.show', $this->post->slug);

    }

    public function like($id)
    {
        $data = [
            'comment_id' => $id,
            'user_id' => Auth::user()->id
        ];

        $like = Like::where($data);
        if ($like->count() > 0) {
            $like->delete();
        } else {
            Like::create($data);
        }
        return NULL;
    }



    public function render()
    {
        $comments = Komen::with('user', 'childrens')
            ->where('post_id', $this->post->id)
            ->whereNull('comment_id')
            ->orderBy('created_at', 'desc')
            ->get();

        $total_comment = Komen::where('post_id', $this->post->id)->count();
        return view('livewire.comment', [
            'comments' => $comments,
            'total_comment' => $total_comment
        ]);
    }
}
