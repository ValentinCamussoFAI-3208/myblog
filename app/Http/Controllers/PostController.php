<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function getMyPosts()
    {
        $user = Auth::user();
        $posts = $user->posts()->with('category')->get();

        return view('myPosts.index', compact('posts'));
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('myPosts.edit', compact('post'));
    }

    // Actualizar la publicación
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ], [
            'title.required' => 'El campo título es obligatorio.',
            'content.required' => 'El campo contenido es obligatorio.',
        ]);
        $post = Post::findOrFail($id);
        $post->update($request->only('title', 'content'));

        return redirect()->route('myPosts.index')->with('success', 'Publicación actualizada con éxito.');
    }

    // Eliminar la publicación
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Eliminar la foto asociada si existe
        if ($post->photo) {
            Storage::delete($post->photo);
        }

        $post->delete();

        return redirect()->route('myPosts.index')->with('success', 'Publicación eliminada con éxito.');
    }
}
