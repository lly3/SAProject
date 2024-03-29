{{-- resources/views/posts/show.blade.php --}}

@extends('layouts.main')

@section('content')

    {{-- main-card --}}
    <div class="min-h-screen p-0 sm:p-6">
        <div class="mx-auto w-full px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
            {{ csrf_field() }}
            <div class="flex gap-x-6 flex-col md:flex-row">
                <div class='leftside md:w-1/2 w-full'>
                    <div id="default-carousel" class="relative overflow-hidden bg-gray-300 rounded-lg" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div id="carousel-wrapper" class="h-96 flex" data-slice-index=0>
                            @foreach($product->images as $image)
                                <div class="duration-700 ease-in-out grow-0 shrink-0 basis-full z-10">
                                    <img src="{{ asset('/images/'.$image->url) }}" class="block h-full object-contain mx-auto">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="rightside md:w-1/2 w-full flex-col flex">
                    <h1 class="text-2xl font-bold mb-5 md:mt-0 mt-3">{{ $product->p_title }}</h1>
                    <h1 class="text-3xl font-bold md:mt-0 mt-3">ราคา {{ $product->p_price }} บาท</h1>
                    <p class="break-all leading-7 my-5">
                        {{ $product->p_description }}
                    </p>
                    <p class="my-3">
                        จำนวนสินค้าคงเหลือ: <span class="font-bold">{{ $product->p_quantity }} ชิ้น</span>
                    </p>
                    <p class="mb-3">
                        ประเภทไม้: <span class="font-bold">{{ $product->p_wood_type }}</span>
                    </p>
                    <p class="mb-3">
                        ขนาด: <span class="font-bold">{{ $product->p_size }}</span>
                    </p>
                    <form action="{{ route('orders.make', ['product' => $product->id]) }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="flex items-center mb-3">
                            <p class="mr-3 font-bold">จำนวน: </p>
                            <input @if($product->p_quantity == 0) disabled @endif class="max-w-[100px] border-gray-500 rounded-lg" name="quantity" type="number" inputmode="numeric" value=1 min=1 max="{{ $product->p_quantity }}" required/>
                        </div>
                        <button type="submit" @if($product->p_quantity == 0) disabled @endif class="mt-auto text-center w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none @if($product->p_quantity != 0) bg-pink-500 hover:bg-pink-600 @else bg-pink-300 @endif hover:shadow-lg focus:outline-none">ซื้อสินค้า</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


{{--
@extends('layouts.main')

@section('content')
    <article class="mx-8">
        <h1 class="text-3xl mb-1">
            {{ $product->title }}
        </h1>

        <p>
            By {{ $product->user->name }}
        </p>

        <div class="mb-4">
            <p class="bg-orange-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                <svg class="w-6 h-6 inline mr-1" viewBox="0 0 20 20">
                    <path d="M10,6.978c-1.666,0-3.022,1.356-3.022,3.022S8.334,13.022,10,13.022s3.022-1.356,3.022-3.022S11.666,6.978,10,6.978M10,12.267c-1.25,0-2.267-1.017-2.267-2.267c0-1.25,1.016-2.267,2.267-2.267c1.251,0,2.267,1.016,2.267,2.267C12.267,11.25,11.251,12.267,10,12.267 M18.391,9.733l-1.624-1.639C14.966,6.279,12.563,5.278,10,5.278S5.034,6.279,3.234,8.094L1.609,9.733c-0.146,0.147-0.146,0.386,0,0.533l1.625,1.639c1.8,1.815,4.203,2.816,6.766,2.816s4.966-1.001,6.767-2.816l1.624-1.639C18.536,10.119,18.536,9.881,18.391,9.733 M16.229,11.373c-1.656,1.672-3.868,2.594-6.229,2.594s-4.573-0.922-6.23-2.594L2.41,10l1.36-1.374C5.427,6.955,7.639,6.033,10,6.033s4.573,0.922,6.229,2.593L17.59,10L16.229,11.373z"></path>
                </svg>
                {{ $product->view_count }} views
            </p>

            <p class="bg-green-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-6 inline mr-1" viewBox="0 0 16 16">
                    <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                </svg>
                {{ $product->like_count }} likes
            </p>
        </div>

        <div class="my-4">
            @foreach($product->tags as $tag)
                <a class="bg-pink-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2"
                    href="{{ route('tags.show', ['tag' => $tag->name]) }}">
                    {{ $tag->name }}
                </a>
            @endforeach
        </div>

        <p class="text-gray-900 font-normal p-2 mb-8">
            {{ $product->description }}
        </p>

        <div class="relative py-4">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-b border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="bg-white px-4 text-sm text-gray-500">Action</span>
            </div>
        </div>

        @can('update', $product)
            <div>
                <a class="app-button" href="{{ route('posts.edit', ['post' => $product->id]) }}">
                    Edit this post
                </a>
            </div>
        @endcan

    </article>

    <section class="mx-16 mt-8">
        <form action="{{ route('posts.comments.store', ['post' => $product->id]) }}" method="post">
            @csrf
            <div>
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
                <textarea name="message" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea>
            </div>
            <div class="mt-2">
                <button type="submit" class="app-button">Comment</button>
            </div>

        </form>
    </section>

    @if ($product->comments)
        <section class="mt-8 mx-16">
            <h1 class="text-3xl mb-2">{{ $product->comments->count() }} Comments</h1>

            @foreach($product->comments->sortByDesc('created_at') as $comment)
                <div class="mb-2 block p-6 w-full bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 ">
                    <p class="bg-orange-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                        {{ $comment->created_at->diffForHumans() }}
                    </p>
                    <div class="text-lg pl-3">
                        {{ $comment->message }}
                    </div>
                </div>
            @endforeach
        </section>
    @endif
@endsection
--}}


