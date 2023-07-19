<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.crete',[
            'tags'          => Tag::all(),
            'categories'    => Category::all(),
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // return $request;
        $tags = explode(',', $request->tags);
        $post           = new Post;
        $post->title    =$request ->title;
        $post->slug = Str::slug($request->title);
        $post->body =$request->body;
        $post->author_id =Auth::user()->id;

        $post->category_id =$request->category_id;
        $post->published_at =$request->published_at;
        $post->meta_description =$request->meta_description;


        if($request->hasFile('cover_image')){
            $image=$request->file('cover_image');
            $imageName= $image->getClientOriginalName();
            $imageNewName  =explode('.',$imageName)[0];
            $fileExtention = time() . '.' . $imageNewName . '.' . $image->getClientOriginalExtension();
        //1233333.pic.png
            $location = storage_path('app/public/images/' . $fileExtention);
            Image::make($image)->resize(1200,630)->save($location);
            $post->cover_image = $fileExtention;
        };
        $post->save();
        $post->tags()->sync($tags);

        return redirect()->route('posts.index')->with('success','Post Created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
