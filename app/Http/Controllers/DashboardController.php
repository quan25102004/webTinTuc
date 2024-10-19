<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $countCategory = Category::count('id');
        // dd($countCategory);

        $countPost = Post::count('id');

        $sumView = Post::sum('view');

        $sumComment = Comment::count('id');

        return view('admin.dashboard',compact('countCategory','countPost','sumView','sumComment'));
    }

}
