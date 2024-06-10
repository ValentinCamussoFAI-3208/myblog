@section('title', $category->title)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $category->title }}
        </h2>
    </x-slot>
    <div class="bg-gray-600 flex items-center justify-center flex-col text-gray-800 dark:text-gray-200">
        <div class="flex flex-col items-center px-4 w-4/6">
            @if ($posts->isEmpty())
                    <p class="mt-32">No hay posts en esta categoría.</p>
                @auth
                    <a 
                        href="/category/{{ $category->id}}/create" 
                        class="mt-12 mb-32 bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    >
                        Crear post
                    </a>
                @else
                    <a 
                        href="/login" 
                        class="mt-12 mb-32 bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    >
                        Crear post
                    </a>
                @endauth
            @else
                <div class="bg-slate-800 flex flex-col-reverse">
                    
                    @foreach ($posts as $post)
                        <a href="/category/{{ $category->id }}/show/{{ $post->id }}" class="my-3 mx-auto px-40 py-2">
                            <div class="bg-slate-700 text-white shadow-2xl rounded tracking-wide">
                                <!--<div class="md:flex-shrink-0">
                                    <img src="{{ asset('storage/' . $post->poster) }}" alt="Poster {{ $post->title }}" class="w-96 h-64 object-cover rounded-t-lg">
                                </div>-->
                                <div class="px-4 py-4">
                                    <div class="flex justify-between mt-3 text-gray-400">
                                        <p class="">{{ $post->user->name }}</p>
                                        <span class="align-end">{{ $post->updated_at->format('d/m/Y') }}</span>
                                    </div>
                                    <h3 class="font-bold text-2xl tracking-normal">{{ $post->title }}</h3>
                                    <div class="md:flex-shrink-0">
                                        <img src="{{ asset('storage/' . $post->poster) }}" alt="Poster {{ $post->title }}" class="w-96 h-64 object-cover rounded-t-lg">
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    @auth
                        <div class="w-auto mx-auto mt-6">
                            @if (!$posts->isEmpty())
                                <a 
                                    href="/category/{{ $category->id}}/create" 
                                    class="my-5 bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                >
                                    Crear post
                                </a>
                            @endif
                        </div>
                    @else
                        <div class="w-auto mx-auto mt-6">
                            @if (!$posts->isEmpty())
                                <a 
                                    href="/login" 
                                    class="my-5 bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                >
                                    Crear post
                                </a>
                            @endif
                        </div>
                    @endauth
                </div>
            @endif
        </div>
    </div>
</x-app-layout>