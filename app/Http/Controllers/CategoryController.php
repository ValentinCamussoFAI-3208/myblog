<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
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
        Log::info('Solicitud recibida:', $request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',
        ]);
        Log::info('Validación pasada');
        // Crear el nuevo post
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        if ($request->hasFile('poster')) {
            Log::info('Archivo de imagen encontrado');
            $path = $request->file('poster')->store('posters', 'public');
            Log::info('Imagen almacenada en: ' . $path);
            $post->poster = $path;
        }
        $post->habilitated = 1;  // Asumimos que los posts se habilitan por defecto
        $post->save();
        Log::info('Post guardado con éxito:', $post->toArray());

        // Asociar el post con la categoría
        $category = Category::findOrFail($id);
        $category->posts()->attach($post->id);

        return redirect()->route('category.show', $id)->with('success', 'Post creado exitosamente.');
    }

    // La vista para editar una categoría
    public function getEdit($id)
    {
        $data['post'] = Post::findOrFail($id);
        return view('category.edit', $data);
    }
}
