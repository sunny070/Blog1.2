<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Contracts\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\Relations\where;


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
    public static function searchPost($search)
    {
        return empty($search) ?static::query() 
        :static::query()->Where('id', 'like', '%' .$search. '%')
        ->orWhere('title' , 'like', '%' . $search . '%')
        ->orWhere('body' , 'like', '%' . $search . '%');
    }


    // Blog Page
    
    public function scopeCategory(Builder $query, string $category): Builder
    {   
        return $query->where('category_id',$category);
    }

    public function scopeFeatured(Builder $query):Builder
    {
        return $query->where('featured' , true);
    }

    public function scopePublished(Builder $query):Builder
    {
        return $query->whereNotNull('published_at')->where('published_at', '<=' ,new \DateTime());
    }


    public function scopeRecentAsc(Builder $query):Builder
    {
        return $query->orderBy('title' , 'asc');
    }

    public function scopeRecentDesc(Builder $query):Builder
    {
        return $query->orderBy('title' , 'desc');
    }

}
