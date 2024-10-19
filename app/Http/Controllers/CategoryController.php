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
        $search = $request->input('search');
        if ($search) {
            $data = Category::query()
                ->where('name', 'LIKE', '%' . $search . '%')
                ->select('*')->paginate(5);
        } else {
            $data = Category::query()->latest('id')->paginate(5);
        }
        return view('admin.danhmuc', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'max:100', Rule::unique('categories')],
        ]);
        try {
            Category::query()->create($data);
            return redirect()->route('categories.index')
                ->with('succes', true);
        } catch (\Throwable $th) {
            return back()->with('succes', false);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validate([
            'name' => ['required', 'max:100', Rule::unique('categories')->ignore($category->id)],
        ]);
        try {
            $category->update($data);
            return back()->with('succes', true);
        } catch (\Throwable $th) {

            return back()->with('succes', false)->with('error', $th->getMessage());
        }
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return back()->with('succes', true);
        } catch (\Throwable $th) {

            return back()->with('succes', false)->with('error', $th->getMessage());
        }
    }
    public function trash()
    {
        $trashs = Category::onlyTrashed()->latest('id')->paginate('5');
        return view('admin.categories.trash', compact('trashs'));
    }
    public function restore($category)
    {
        $category = Category::onlyTrashed()->findOrFail($category);
        $category->restore();
        return redirect()->route('categories.trash')->with('success', true);
    }
}
