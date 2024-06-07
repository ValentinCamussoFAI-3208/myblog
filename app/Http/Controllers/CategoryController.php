<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class CategoryController extends Controller
{
    // Muestra todas las categorías de la página
    /*public function getIndex() {
        $posts = Post::orderby('id','desc')->paginate(10);
        return view('category.index', compact('posts'));
    }*/

    public function getIndex($id){
        $category = Category::findOrFail($id);

        // Obtener todos los posts de la categoría
        $posts = $category->posts;
        return view('category.showCategory', compact('category', 'posts'));
    }

    public function getCategories(){
        $categories = Category::get();
        return view ('category.index', compact('categories'));
    }

    // Obtiene el ID de la categoría por parámetro
    public function getShow($categoryId, $postId){
        // Busco categoria
        $category = Category::findOrFail($categoryId);

        // Busco post
        $post = $category->posts()->findOrFail($postId);

        return view('category.show', compact('category', 'post'));
    }
    /*public function getShow($id) {
        $post = Post::findOrFail($id);
        return view('category.show', compact('post'));
    }*/

    // La vista para crear una nueva categoría
    public function getCreate() {
        return view('category.create');
    }

    // La vista para editar una categoría
    public function getEdit($id) {
        $data['post'] = Post::findOrFail($id);
        return view('category.edit', $data);
    }
}
