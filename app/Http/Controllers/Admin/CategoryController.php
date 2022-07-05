<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cats = Category::orderByDesc('id')->get();
        return view('admin.categories.index', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $val_data = $request->validate([
            'name' => 'required|unique:categories'
        ]);

        $slug = Str::slug($request->name);
        $val_data['slug'] = $slug ;

        Category::create($val_data);

        return redirect()->back()->with('message', "Category $slug added successfully");



    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
      /*   $request->all(); */

        $val_data = $request->validate([
            'name' =>[
                'required', Rule::unique('categories')->ignore($category)]
        ]);

        $slug = Str::slug($request->name);
        $val_data['slug'] = $slug ;

        $category->update( $val_data);

        return redirect()->back()->with('message', " $slug updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();

        return redirect()->back()->with('message', "Category $category->name removed");
    }
}
