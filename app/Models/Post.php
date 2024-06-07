<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function categories(){
        return $this->belongsToMany(Category::class, 'categories_posts', 'post_id', 'category_id');
    }
    use HasFactory;
}
