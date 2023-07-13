<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    
    protected $table = 'posts';

    protected $fillable = [
        'cover_image',
        'title',
        'slug',
        'body',
        'meta_description',
        'published_at',
        'featured',
        'author_id',
        'category_id',
    ];
    // the below given function can be displayed on the blade file $post->id
    // public function id(): int
    // {
    //     return $this->id;
    // }
    // public function title(): string
    // {
    //     return $this->title;
    // }

    public function user(): BelongsTo
    {
        //admin user is just a name
        return $this->belongsTo(User::class,'author_id')
        ->withDefault('Admin User');
    }
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class,'post_tag' );
    }
}
