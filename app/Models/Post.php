<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getExcerpt()
    {
        return Str::limit(strip_tags($this->body), 25);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            Storage::delete($post->image);
        });

        static::updating(function ($post) {
            if ($post->isDirty('image') && ($post->getOriginal('image') !== null)) {
                Storage::delete($post->getOriginal('image'));
            }
        });
    }
}
