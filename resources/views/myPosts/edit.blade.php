<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar post '{{$post->title}}'
        </h2>
    </x-slot>
    <div class="bg-gray-600 flex items-center justify-center h-screen">
        <div class="bg-slate-800 p-6 rounded-lg shadow-lg mx-auto min-h-1/2 w-1/2 flex justify-center items-center">
            <div class="text-white w-1/2 p-5 rounded shadow-md">
                <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">Editar post</h1>

                <form action="{{ route('myPosts.update', $post->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-4">
                    @csrf
                    @method('PUT')
                
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Título</label>
                        <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $post->title }}" required>
                    </div>
                
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 font-bold mb-2">Contenido</label>
                        <textarea name="content" id="content" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ $post->content }}</textarea>
                    </div>
                
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>