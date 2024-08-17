<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostEdit extends Component
{
    use WithFileUploads;

    public $post;
    public $title;
    public $slug;
    public $category_id;
    public $image;
    public $body;
    public $oldImage;
    public $categories;

    public function mount($slug)
    {

        $this->post = Post::where('slug', $slug)->firstOrFail();
        $this->title = $this->post->title;
        $this->slug = $this->post->slug;
        $this->category_id = $this->post->category_id;
        $this->body = $this->post->body;
        $this->oldImage = $this->post->image;
        $this->categories = Category::all();
    }

    protected function rules()
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'nullable|image|file|max:1024',
            'body' => 'required'
        ];

        if ($this->slug != $this->post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        return $rules;
    }

    public function updatedTitle($value)
    {
        $this->slug = Str::slug($value);
    }

    public function update()
    {
        $validatedData = $this->validate();

        // if ($this->image) {
        //     if ($this->oldImage) {
        //         Storage::delete($this->oldImage);
        //     }
        //     $validatedData['image'] = $this->image->store('post-images');
        // } else {
        //     $validatedData['image'] = $this->oldImage;
        // }
        if ($this->image) {
            $validatedData['image'] = $this->image->store('post-images');
        } else {
            $validatedData['image'] = $this->oldImage;
        }


        $this->post->update($validatedData);

        session()->flash('success', 'Update is successful!');
        return redirect()->route('dashboard.show', $this->post->slug);
    }
    public function render()
    {
        return view('livewire.post-edit');
    }
}
