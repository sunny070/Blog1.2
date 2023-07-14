<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('dashboard.categories.index',[
            'categories'=>Category::with('subCategories')->whereNull('parent_id')->get(),
    
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $category)
    {
        
        return view('dashboard.categories.create',[
            'categories'=>Category::with('subCategories')->whereNull('parent_id')->get(),
    
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        // $this->validate($request, [
        //     'name' => ['required', 'max:200'],
        //     'parent_id' => ['sometimes','nullable','numeric'],
        // ]);
        $category =new Category;
        $category->name =$request->name;
        $category->parent_id =$request->parent_id;
        $category->slug =Str::slug($request->name);
        $category->save();
        // Category::create($request);
        return redirect()->route('categories.index')->with('success','Category created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories=Category::with('subCategories')->whereNull('parent_id')->get();
        return view('dashboard.categories.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
                'name' => ['required', 'unique:categories'],
                'parent_id' => ['sometimes','nullable'],
            ]);
            $category->name= $request->name;
            // $category->parent_id= $request->parent_id;
            $category->slug= Str::slug($request->name);

            $category->save();
            return redirect()->route('categories.index')->with('success','Category successfully updated!');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('error','Categories Deleted Successfully');
    }
}
