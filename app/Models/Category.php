<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function post(){
        return $this->hasOne(Post::class);
        // quan hệ category với post là 1 - 1 dùng hasOne
    }

   
}
