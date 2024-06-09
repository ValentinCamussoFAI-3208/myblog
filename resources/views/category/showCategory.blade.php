<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $category->title }}
        </h2>
    </x-slot>
    <div class="bg-gray-600 flex items-center justify-center flex-col min-h-screen text-gray-800 dark:text-gray-200">
        <div class="max-w-lg bg-slate-800 flex flex-col items-center min-h-screen px-4">
            <div class="dark:bg-slate-900 bg-slate-400 p-5 rounded shadow-md w-full max-w-md    ">
                <form action="{{ route('category.storePost', $category->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="mb-2">
                        <input type="text" id="title" placeholder="Título" name="title" class="text-gray-800 border rounded w-full py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        @error('title')
                        <p class="text-red-500 mt-2 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <textarea id="content" name="content" placeholder="Contenido" rows="2" class="text-gray-800 border rounded w-full py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                        @error('content')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="poster" class="block font-bold mb-2">Imagen:</label>
                        <input class="block w-full mb-5 text-md text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="poster" name="poster" type="file">
                        @error('poster')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class=" bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Crear posteo
                        </button>
                    </div>
                </form>
            </div>
            <div class="rounded-lg mx-auto">
                @if ($posts->isEmpty())
                <p class="my-6">No hay posteos en esta categoría.</p>
                @else
                @foreach ($posts as $post)
                <div class="p-4 bg-slate-700 rounded-lg">
                    <img src="{{ asset('storage/' . $post->poster) }}" alt="Poster">
                    <a href="/category/{{$category->id}}/show/{{$post->id}}">{{$post->title}}</a>
                </div>
                @endforeach
                <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="/category">Volver a las categorías</a>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>