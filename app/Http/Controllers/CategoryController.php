<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class CategoryController extends Controller
{
    // Muestra todas las categorías de la página
    /*public function getIndex() {
        $posts = Post::orderby('id','desc')->paginate(10);
        return view('category.index', compact('posts'));
    }*/

    public function getIndex($id)
    {
        $category = Category::findOrFail($id);

        // Obtener todos los posts de la categoría
        $posts = $category->posts;
        return view('category.showCategory', compact('category', 'posts'));
    }

    public function getCategories()
    {
        $categories = Category::get();
        return view('category.index', compact('categories'));
    }

    // Obtiene el ID de la categoría por parámetro
    public function getShow($categoryId, $postId)
    {
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

    public function storePost(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'required|image|mimes:jpeg,png,jpg|max:10000',
            'content' => 'required|string',
        ], [
            'title.required' => 'El campo título es obligatorio.',
            'content.required' => 'El campo contenido es obligatorio.',
            'poster.required' => 'Debe adjuntar una imagen.(JPEG, PNG, JPG de hasta 10MB)',
        ]);
        // Crear el nuevo post
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        if ($request->hasFile('poster')) {
            $path = $request->file('poster')->store('posters', 'public');
            $post->poster = $path;
        }
        $post->habilitated = 1;  // Asumimos que los posts se habilitan por defecto
        $post->category_id = $id;
        $post->user_id = Auth::id();
        $post->save();

        return redirect()->route('category.show', $id)->with('success', 'Post creado exitosamente.');
    }

    // La vista para editar una categoría
    public function getEdit($id)
    {
        $data['post'] = Post::findOrFail($id);
        return view('category.edit', $data);
    }
}
