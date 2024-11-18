<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('q') && !empty($request->input('q'))){
            $search = $request->input('q');
            $category = Category::where('name', 'LIKE', "%{$search}%")->orderBy('id', 'desc')->get();
            return response()->json($category);

        }else{
            $category = Category::orderBy('id','desc')->get();
            return response()->json($category);
        }
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
            Category::create($data);
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json(['msg'=>'Lỗi hệ thống!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Category::find($id);
        return response()->json(['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => ['required','max:100', Rule::unique('categories','name')->ignore($id)],
        ]);
        $category = Category::find($id);
        try {
            // $data['name']=$data['nameUpdate'];
            $category->update($data);
            return response()->json($category);
        } catch (\Throwable $th) {
            
            return response()->json(['msg'=>'Lỗi hệ thống!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json(['msg' => 'Xóa thành công!']);
    }

    public function trash()
    {
        $trash = Category::onlyTrashed()->get();
        return response()->json( $trash);

    }
    public function restore($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();
        return response()->json(['data' => $category]);

    }
}
