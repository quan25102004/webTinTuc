<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::with(['category', 'tag'])->orderBy('id','desc')->get();
        $post->map(function($post) {
            $post->category_name = $post->category->name; // Lấy tên của category
            return $post;
        });
        return response()->json($post);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'max:100', Rule::unique('posts')],
            'content' => 'required|max:10000',
            'category_id' => 'required',
            'image' => 'required|image|max:2048'
        ]);
        try {
            if ($request->hasFile('image')) {
                $data['image'] = Storage::put('image', $request->file('image'));
            }
            $post = Post::query()->create($data);

            $post->tag()->attach($request->tags);
            // dd($dataPost);
            return response()->json(['data'=>$post]);
        } catch (\Throwable $th) {
            if (!empty($data['image']) && Storage::exists($data['image'])) {
                Storage::delete($data['image']);
            }
            return response()->json(['msg'=>'Lỗi hệ thống!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with(['category', 'tag'])->find($id);
        $post->category_name = $post->category->name; //
        $post->tag_list = $post->tag->pluck('name'); // tag là tên hàm trong model
        $post->tag_id = $post->tag->pluck('id'); // tag là tên hàm trong model
        if(!$post){
        return response()->json(['msg'=>'Không có bản ghi: '. $id ]);

        }
        return response()->json(['data'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => ['required', 'max:100', Rule::unique('posts')->ignore($id)],
            'content' => 'required|max:10000',
            'category_id' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);
        $post = Post::with(['category', 'tag'])->find($id);

        try {
            if ($request->hasFile('image')) {
                $data['image'] = Storage::put('image', $request->file('image'));
            }
            $old_img = $post->image;
            $post->update($data);

            $post->tag()->sync($request->tags);
            if ($request->hasFile('image') && !empty($old_img) && Storage::exists('image')) {
                Storage::delete($old_img);
            }
            // dd($dataPost);
            return response()->json(['data'=>$post]);

        } catch (\Throwable $th) {
            if (!empty($data['image']) && storage::exists($data['image'])) {
                Storage::delete($data['image']);
            }
            return response()->json(['msg'=>'Lỗi hệ thống!']);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::with(['category', 'tag'])->findOrFail($id);
        if($post){
            $post->delete();
            return response()->json( ['msg'=>'Xóa thành công!']);
        }else{
            return response()->json( []);
        }
    }

    public function trash()
    {
        $trash = Post::with(['category', 'tag'])->onlyTrashed()->orderBy('deleted_at','desc')->get();
        $trash->map(function($trash){
            $trash->category_name = $trash->category->name;
            return $trash;
        });
        return response()->json( $trash);

    }

    public function restore($id)
    {
        $post = Post::with(['category', 'tag'])->onlyTrashed()->findOrFail($id);
        $post->restore();
        return response()->json(['data' => $post]);
    }
}
