<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-6 rounded-lg shadow-lg mx-auto w-1/2">
            @foreach ($categories as $category)
                <h2>
                    <a href="/category/{{$category->id}}">{{$category->title}}</a>
                </h2>
            @endforeach
        </div>
    </div>
</x-app-layout>