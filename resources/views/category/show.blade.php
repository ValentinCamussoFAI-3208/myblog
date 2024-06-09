@section('title', $post->title)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Posteo: {{ $post->title }}
        </h2>
    </x-slot>
    <div class="bg-gray-600 flex items-center justify-center flex-col text-gray-800 dark:text-gray-200">
        <div class="max-w-lg bg-slate-800 flex flex-col items-center p-4">
            <div class="rounded-lg mx-auto">
                <div class="mx-auto px-4 py-8 max-w-xl my-20">
                    <div class="bg-white shadow-2xl rounded-lg mb-6 tracking-wide">
                        <div class="md:flex-shrink-0">
                            <img src="{{ asset('storage/' . $post->poster) }}" alt="Poster {{ $post->title }}" class="w-full h-64 rounded-lg rounded-b-none">
                        </div>
                        <div class="px-4 py-2 mt-2">
                            <h3 class="font-bold text-2xl text-gray-800 tracking-normal">{{ $post->title }}</h3>
                            <p class="text-sm text-gray-700  mr-1">{{$post->content}}</p>
                            <div class="author flex items-center -ml-3 my-3">
                                <h2 class="text-sm tracking-tighter text-gray-900">
                                    <p>Por {{$post->user->name}}</p> <span class="text-gray-600">{{$post->updated_at}}</span>
                                </h2>
                            </div>
                            <div class="flex items-center justify-between mt-2 mx-6">
                                <a href="/category/{{$category->id}}/show/{{$post->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Ver más</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{ url()->previous() }}">Volver atrás</a>
            </div>
        </div>
    </div>
</x-app-layout>