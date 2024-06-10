@section('title', 'Crear nuevo post')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Crear post en {{$category->title}}
        </h2>
    </x-slot>
    <div class="bg-gray-600 flex items-center justify-center">
        <div class="bg-slate-800 p-6 rounded-lg shadow-lg mx-auto min-h-1/2 w-1/2 flex justify-center items-center my-12">
            <div class="text-white w-1/2 p-5 rounded shadow-md">
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

                    <div class="flex items-center justify-center w-full mb-4">
                        <label for="poster" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Haga click para subir</span> o arrastra una imagen</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG (10MB MAX)</p>
                            </div>
                            <input id="poster" name="poster" type="file" class="hidden" />
                            @error('poster')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </label>
                    </div> 

                    <div class="flex items-end justify-end">
                        <button type="submit" class=" bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Publicar post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>