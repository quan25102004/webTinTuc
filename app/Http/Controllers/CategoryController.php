<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index(Request $request)
    {

        return view('admin.danhmuc');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.danhmuc');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('admin.danhmuc');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.danhmuc');
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    public function edit(Category $category)
    {
        return view('admin.danhmuc');

    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        return view('admin.danhmuc');

    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy(Category $category)
    {
        return view('admin.danhmuc');

    }
    public function trash()
    {
        return view('admin.danhmuc');

    }
    public function restore($category)
    {
        return view('admin.danhmuc');
    }
}
