<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Mis posts
        </h2>
    </x-slot>
    <div class="bg-gray-600 flex items-center justify-center flex-col min-h-screen text-gray-800 dark:text-gray-200">
        <div class="max-w-lg bg-slate-800 flex flex-col items-center min-h-screen px-4">
            <div class="rounded-lg mx-auto">
                @if ($posts->isEmpty())
                <p class="my-6">No has creado ningun posteo.</p>
                @else
                @foreach ($posts as $post)
                <div class="p-4 bg-slate-700 rounded-lg m-2">
                    <h2>Titulo: {{ $post->title }}</h2>
                    <h2>Contenido: {{ $post->content }}</h2>
                    <p>Categoría: {{ $post->category->title }}</p>
                    <img src="{{ asset('storage/' . $post->poster) }}" alt="Poster">
                    <!-- Botón de editar -->
                    <a href="{{ route('myPosts.edit', $post->id) }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded mt-2">Editar</a>

                    <!-- Botón de eliminar -->
                    <form action="{{ route('myPosts.destroy', $post->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded mt-2">Eliminar</button>
                    </form>
                </div>
                @endforeach
                @endif
            </div>

        </div>
    </div>
</x-app-layout>