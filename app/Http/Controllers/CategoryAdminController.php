<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryAdminController extends Controller
{
    public function index()
    {
        return view('dashboard.categories.index', [
            'categories' => Category::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.categories.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories',
        ]);

        Category::create($validatedData);

        return redirect('/dashboard/categories')->with('success', 'New Category has been added!');
    }

    public function show(Category $category)
    {
        //
    }

    //edit untuk tampilin view edit
    public function edit(Category $category)
    {   
        return view('dashboard.categories.edit', [
            'category' => $category
        ]);
    }

    //update untuk ubah data
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required|max:255',
        ];

        if($request->slug != $category->slug){
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        Category::where('id', $category->id)
                ->update($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Category has been edited!');
    }

    public function destroy(Category $category)
    {   
        Category::destroy($category->id);
        return redirect('/dashboard/categories')->with('success', 'category has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
