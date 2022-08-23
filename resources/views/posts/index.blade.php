@extends('layouts.main')

@section('content')
    <!-- This is a search bar -->
    <form action="{{ route('searchByTitle') }}" method="GET" class="flex items-center">
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-full">
            <input type="search" name="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ค้นหาด้วยหัวข้อ" required="">
        </div>
        <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <span class="sr-only">Search</span>
        </button>
    </form>
    @if(Route::currentRouteName() == 'searchByTitle')
        <div>
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white break-all max-h-8 text-ellipsis overflow-hidden">
                search : {{ $search }}
            </h5>
        </div>
    @endif
    @foreach ($posts as $post)
        <div class='w-full p-3'>
            <a href="{{ route('posts.show', ['post' => $post->id]) }}"
               class="flex flex-col items-center bg-white rounded-none md:rounded-l-lg border shadow-md md:flex-row md:max-w-4xl md:mx-auto hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="bg-gray-300 rounded-none md:rounded-l-lg md:w-1/3 w-full h-80 flex">
                    @if($post->images->first() != null)
                        <img class="object-contain w-full rounded-none md:h-auto md:w-full md:rounded-l-lg" src="{{ asset('/images/'.$post->images->first()->url) }}">
                    @endif
                </div>
                <div class="flex flex-col justify-between p-4 leading-normal md:w-2/3 w-full">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white break-all max-h-8 text-ellipsis overflow-hidden">
                        {{ $post->title }}
                    </h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400 leading-6 break-all max-h-12 text-ellipsis overflow-hidden">
                        {{ $post->description }}
                    </p>
                    <div class="mt-2 mb-3 max-h-[90px] overflow-hidden">
                        <p>หัวข้อที่เกี่ยวข้อง: </p>
                        @foreach($post->tags as $tag)
                            <p class="bg-pink-100 text-gray-800 text-sm font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 mt-2">
                                {{ $tag->name }}
                            </p>
                        @endforeach
                    </div>
                    <p>
                        รับผิดชอบโดย:
                        <span class="bg-green-100 text-gray-800 text-sm font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 mt-2">
                            {{ $post->organization->name }}
                        </span>
                    </p>
                    <p>โดย <span class="font-bold">{{ $post->penname }}</span></p>
                    <p class="text-right">{{ $post->created_at->diffForHumans() }}</p>
                </div>
            </a>
        </div>
    @endforeach
@endsection
