<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Foro {{ $category->title }}
        </h2>
    </x-slot>
    <div class="flex items-center justify-center bg-red-800">
        <div class="new-post-form  text-gray-800 dark:text-gray-200">
            <form action="{{ route('category.storePost', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                @error('title')
                <div>{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="content">Contenido</label>
                    <textarea name="content" id="content" class="form-control" rows="3" required></textarea>
                </div>
                @error('content')
                <div>{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="poster">Poster</label>
                    <input type="file" name="poster" id="poster" class="form-control">
                </div>
                @error('poster')
                <div>{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Publicar</button>
            </form>
        </div>
    </div>

    <div class="flex items-center justify-center h-screen">

        <div class="bg-white p-6 rounded-lg shadow-lg mx-auto w-1/2">
            @foreach ($posts as $post)
            <h2>
                <img src="{{ asset('storage/' . $post->poster) }}" alt="Poster">
                <a href="/category/{{$category->id}}/show/{{$post->id}}">{{$post->title}}</a>
            </h2>
            @endforeach
        </div>
    </div>
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-6 rounded-lg shadow-lg mx-auto w-1/2">
            <a href="/category">Volver a las categorías</a>
        </div>
    </div>
</x-app-layout>