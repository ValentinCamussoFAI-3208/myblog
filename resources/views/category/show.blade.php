@section('title', $post->title)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Post: {{ $post->title }}
        </h2>
    </x-slot>
    <div class="bg-gray-600 flex items-center justify-center flex-col text-gray-800 dark:text-gray-200">
        <div class="flex flex-col items-center p-4 w-1/2">
            <div class="rounded mx-auto">
                <div class="mx-auto px-4 mt-10 w-3/5">
                    <div class="bg-white shadow-2xl rounded-lg mb-6 tracking-wide">
                        <div class="px-4 py-2 mt-2">
                            <div class="flex justify-between my-3">                                    
                                <p class="text-gray-800">Por {{$post->user->name}}</p>
                                <span class="text-gray-600">{{$post->updated_at->format('d/m/Y')}}</span>
                            </div>
                            <h3 class="font-bold text-2xl text-gray-800 tracking-normal">{{ $post->title }}</h3>
                            <p class="text-sm text-gray-700  mr-1">{{$post->content}}</p>
                        </div>
                        <div class="md:flex-shrink-0">
                            <img src="{{ asset('storage/' . $post->poster) }}" alt="Poster {{ $post->title }}" class="w-full h-auto object-cover rounded rounded-t-none">
                        </div>
                    </div>
                </div>
                <div class="text-center">   
                    <a 
                        href="/category/{{ $category->id }}" 
                        class="mt-12 mb-32 bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    >
                        Volver atrás
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>