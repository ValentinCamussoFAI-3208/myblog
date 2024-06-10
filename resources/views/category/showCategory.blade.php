@section('title', $category->title)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $category->title }}
        </h2>
    </x-slot>
    <div class="bg-gray-600 flex items-center justify-center flex-col text-gray-800 dark:text-gray-200">
        <div class=" flex flex-col items-center px-4 w-4/6">
            @auth
            <div class="dark:bg-slate-900 bg-slate-400 p-5 rounded shadow-md w-full">
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
            @endauth

            <div class="rounded-lg">
                @if ($posts->isEmpty())
                <p class="my-32">No hay posteos en esta categoría.</p>
                @else
                @foreach ($posts as $post)
                <a href="/category/{{ $category->id }}/show/{{ $post->id }}" class="mx-auto px-40 py-2">
                    <div class="bg-white shadow-2xl rounded-lg mb-6 tracking-wide">
                        <div class="px-4 py-2">
                            <div class="flex justify-between my-3">
                                <p class="text-gray-800">{{ $post->user->name }}</p>
                                <span class="text-gray-600 align-end">{{ $post->updated_at }}</span>
                            </div>
                            <h3 class="font-bold text-2xl text-gray-800 tracking-normal">{{ $post->title }}</h3>
                            <div class="md:flex-shrink-0">
                                <img src="{{ asset('storage/' . $post->poster) }}" alt="Poster {{ $post->title }}" class="w-full h-auto object-cover rounded-t-lg">
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
                @endif
            </div>

        </div>
    </div>
</x-app-layout>