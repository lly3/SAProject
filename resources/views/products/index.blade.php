@extends('layouts.main')

@section('content')
    <div class='mx-auto max-w-6xl w-11/12 grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4 mb-3'>
        @foreach ($products as $product)
            <a href="{{ route('products.show', ['product' => $product->id]) }}" class="w-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="bg-gray-300 rounded-none rounded-t-lg w-full h-48 flex">
                    <img class="object-contain w-full rounded-t-lg md:h-auto md:w-full"
                         src="{{ asset('/images/'.$product->images[0]->url) }}" alt="">
                </div>
                <div class="p-5">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white break-all max-h-8 text-ellipsis overflow-hidden">
                        {{ $product->p_title }}
                    </h5>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white break-all max-h-8 text-ellipsis overflow-hidden">
                        {{ $product->p_price }} บาท
                    </h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400 leading-6 break-all max-h-12 text-ellipsis overflow-hidden">
                        {{ $product->p_description }}
                    </p>
                    <div class="my-3 inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        อ่านเพิ่มเติม
                        <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>
            </a>
        @endforeach

    </div>
@endsection
