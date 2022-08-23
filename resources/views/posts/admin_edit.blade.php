{{-- resources/views/posts/show.blade.php --}}

@extends('layouts.main')

@section('content')

    {{-- stepper  --}}
    <div class="md:px-24">
        <div class="mx-4 p-4">
            <div id="stepper-container" class="flex items-center" data-active=@if($post->status == 'WAIT') 0 @elseif($post->status == 'PROCESS') 1 @else 2 @endif>
                <div class="flex items-center text-teal-600 relative">
                    <div class="@if($post->status == 'WAIT')stepper-active @else stepper-passed @endif @if($post->status == 'PROCESS')stepper-active @else stepper-passed @endif @if($post->status == 'FINISH') stepper-active @endif">
                    </div>
                    <div class="stepper-active-text">รอรับเรื่อง</div>
                </div>
                <div class="@if($post->status == 'WAIT')stepper-inactive-line @else stepper-active-line @endif"></div>
                <div class="flex items-center text-white relative">
                    <div class="@if($post->status == 'PROCESS') stepper-active @elseif($post->status == 'WAIT') stepper-inactive @else stepper-passed @endif @if($post->status == 'FINISH') stepper-active @endif">
                    </div>
                    <div class="@if($post->status == 'WAIT') stepper-inactive-text @else stepper-active-text @endif">กำลังดำเนินการ</div>
                </div>
                <div class="@if($post->status == 'FINISH') stepper-active-line @else stepper-inactive-line @endif"></div>
                <div class="flex items-center text-gray-500 relative">
                    <div class="@if($post->status == 'FINISH') stepper-active @else stepper-inactive @endif">
                    </div>
                    <div class="@if($post->status == 'FINISH') stepper-active-text @else stepper-inactive-text @endif">เสร็จสิ้น</div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 mr-6 flex justify-end">
        <a id="next-stepper" href="{{ route('posts.update.status', ['post' => $post->id]) }}" class="transition duration-200 ease-in-out bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded @if($post->status == 'FINISH') pointer-events-none bg-green-300 @endif">@if($post->status == 'WAIT')รับเรื่องร้องเรียน @else เสร็จสิ้น @endif</a>
    </div>
    {{-- main-card --}}
    <div class="min-h-screen p-0 sm:p-6">
        <div class="mx-auto w-full px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
            {{ csrf_field() }}
            <div class="flex gap-x-6 flex-col md:flex-row">
                <div class='leftside md:w-1/2 w-full'>
                    <div id="default-carousel" class="relative overflow-hidden" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div id="carousel-wrapper" class="bg-gray-300 h-96 rounded-lg flex" data-slice-index=0>
                            @foreach($post->images as $image)
                                <div class="duration-700 ease-in-out grow-0 shrink-0 basis-full z-10 bg-gray-300">
                                    <img src="{{ asset('/images/'.$image->url) }}" class="block h-full object-contain mx-auto">
                                </div>
                            @endforeach
                            {{--
                            <!-- Item 1 -->
                            <div class="duration-700 ease-in-out grow-0 shrink-0 basis-full z-10">
                                <img src="{{ asset('/images/202208171022FFsoZ3yacAAZy_o.jpg') }}" class="block h-full object-contain mx-auto">
                            </div>
                            <!-- Item 2 -->
                            <div class="duration-700 ease-in-out grow-0 shrink-0 basis-full z-10">
                                <img src="{{ asset('/images/202208171022FX8MspEagAA3suO.jpg') }}" class="block h-full object-contain mx-auto">
                            </div>
                            <!-- Item 3 -->
                            <div class="duration-700 ease-in-out grow-0 shrink-0 basis-full z-10">
                                <img src="{{ asset('/images/2022081710220010.jpg') }}" class="block h-full object-contain mx-auto">
                            </div>
                            --}}
                        </div>
                        <!-- Slider controls -->
                        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" id="prev-button">
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-gray-800 dark:bg-gray-800/30 group-hover:bg-gray-800/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" id="next-button">
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-gray-800 dark:bg-gray-800/30 group-hover:bg-gray-800/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="rightside md:w-1/2 w-full">
                    <h1 class="text-2xl font-bold mb-8 md:mt-0 mt-3">{{ $post->title }}</h1>
                    <p class="break-all leading-7">
                        {{ $post->description }}
                    </p>
                    <div class="mt-2 mb-3">
                        <p>หัวข้อที่เกี่ยวข้อง: </p>
                        @foreach($post->tags as $tag)
                            <a class="bg-pink-100 text-gray-800 text-sm font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 mt-2"
                               href="{{ route('tags.show', ['tag' => $tag->name]) }}">
                                {{ $tag->name }}
                            </a>
                        @endforeach
                    </div>
                    <p>
                        รับผิดชอบโดย:
                        <a class="bg-green-100 text-gray-800 text-sm font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 mt-2"
                           href="{{ route('tags.organization.show', ['tag' => $post->organization->name]) }}">
                            {{ $post->organization->name }}
                        </a>
                    </p>
                    <p>โดย <span class="font-bold">{{ $post->penname }}</span></p>
                    <p class="break-all leading-7">
                        ข้อมูลติดต่อ: {{ $post->contact }}
                    </p>
                    <p class="text-right">{{ $post->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>

        <section class="mx-16 mt-8">
            <form action="{{ route('posts.comments.store', ['post' => $post->id]) }}" method="post">
                @csrf
                <div class="mb-4 w-full bg-gray-50 rounded-lg border border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                    <div class="py-2 px-4 bg-white rounded-t-lg dark:bg-gray-800">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" name="message" rows="4" class="px-0 w-full text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="เขียนรายละเอียดที่นี่" required></textarea>
                    </div>
                    <div class="flex justify-end items-center py-2 px-3 border-t dark:border-gray-600">
                        <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            ส่งการตอบกลับ
                        </button>
                    </div>
                </div>
            </form>
        </section>

        <div class="w-full my-8">
            <h1 class="text-2xl font-bold md:mt-0 mb-3">{{ $post->comments->count() }} การตอบกลับ</h1>
            @foreach($post->comments->sortByDesc('created_at') as $comment)
                <div class="mb-2 block p-6 w-full bg-white rounded-3xl border border-gray-200 shadow-md hover:bg-gray-100 ">
                    <p class="bg-orange-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                        {{ $comment->created_at->diffForHumans() }}
                    </p>
                    <div class="text-lg pl-3">
                        {{ $comment->message }}
                    </div>
                    <div class="pl-3 text-right">
                        โดย <span class="font-bold">{{ $comment->user->name }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.getElementById('next-stepper').addEventListener('click', () => {
            const stepper = document.getElementById('stepper-container');
            const firstNode = stepper.firstElementChild.firstElementChild;
            const firstText = firstNode.nextElementSibling;
            const firstLine = firstNode.parentElement.nextElementSibling;
            const secondNode = firstLine.nextElementSibling.firstElementChild;
            const secondText = secondNode.nextElementSibling;
            const secondLine = secondNode.parentElement.nextElementSibling;
            const thirdNode = secondLine.nextElementSibling.firstElementChild;
            const thirdText = thirdNode.nextElementSibling;

            console.log(firstNode);
            const currentActive = parseInt(stepper.getAttribute('data-active'));

            if(currentActive == 0) {
                firstNode.classList.replace('stepper-active', 'stepper-passed');
                firstLine.classList.replace('stepper-inactive-line', 'stepper-active-line');
                secondNode.classList.replace('stepper-inactive', 'stepper-active');
                secondText.classList.replace('stepper-inactive-text', 'stepper-active-text');

                stepper.setAttribute('data-active', currentActive + 1);
            }
            else if(currentActive == 1) {
                secondNode.classList.replace('stepper-active', 'stepper-passed');
                secondLine.classList.replace('stepper-inactive-line', 'stepper-active-line');
                thirdNode.classList.replace('stepper-inactive', 'stepper-active');
                thirdText.classList.replace('stepper-inactive-text', 'stepper-active-text');

                stepper.setAttribute('data-active', currentActive + 1);
            }

            const button = document.getElementById('next-stepper');
            button.classList.add('pointer-events-none');
            button.classList.replace('bg-green-500', 'bg-green-300');
        })
    </script>

@endsection


{{--
@extends('layouts.main')

@section('content')
    <article class="mx-8">
        <h1 class="text-3xl mb-1">
            {{ $post->title }}
        </h1>

        <p>
            By {{ $post->user->name }}
        </p>

        <div class="mb-4">
            <p class="bg-orange-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                <svg class="w-6 h-6 inline mr-1" viewBox="0 0 20 20">
                    <path d="M10,6.978c-1.666,0-3.022,1.356-3.022,3.022S8.334,13.022,10,13.022s3.022-1.356,3.022-3.022S11.666,6.978,10,6.978M10,12.267c-1.25,0-2.267-1.017-2.267-2.267c0-1.25,1.016-2.267,2.267-2.267c1.251,0,2.267,1.016,2.267,2.267C12.267,11.25,11.251,12.267,10,12.267 M18.391,9.733l-1.624-1.639C14.966,6.279,12.563,5.278,10,5.278S5.034,6.279,3.234,8.094L1.609,9.733c-0.146,0.147-0.146,0.386,0,0.533l1.625,1.639c1.8,1.815,4.203,2.816,6.766,2.816s4.966-1.001,6.767-2.816l1.624-1.639C18.536,10.119,18.536,9.881,18.391,9.733 M16.229,11.373c-1.656,1.672-3.868,2.594-6.229,2.594s-4.573-0.922-6.23-2.594L2.41,10l1.36-1.374C5.427,6.955,7.639,6.033,10,6.033s4.573,0.922,6.229,2.593L17.59,10L16.229,11.373z"></path>
                </svg>
                {{ $post->view_count }} views
            </p>

            <p class="bg-green-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-6 inline mr-1" viewBox="0 0 16 16">
                    <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                </svg>
                {{ $post->like_count }} likes
            </p>
        </div>

        <div class="my-4">
            @foreach($post->tags as $tag)
                <a class="bg-pink-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2"
                    href="{{ route('tags.show', ['tag' => $tag->name]) }}">
                    {{ $tag->name }}
                </a>
            @endforeach
        </div>

        <p class="text-gray-900 font-normal p-2 mb-8">
            {{ $post->description }}
        </p>

        <div class="relative py-4">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-b border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="bg-white px-4 text-sm text-gray-500">Action</span>
            </div>
        </div>

        @can('update', $post)
            <div>
                <a class="app-button" href="{{ route('posts.edit', ['post' => $post->id]) }}">
                    Edit this post
                </a>
            </div>
        @endcan

    </article>

    <section class="mx-16 mt-8">
        <form action="{{ route('posts.comments.store', ['post' => $post->id]) }}" method="post">
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

    @if ($post->comments)
        <section class="mt-8 mx-16">
            <h1 class="text-3xl mb-2">{{ $post->comments->count() }} Comments</h1>

            @foreach($post->comments->sortByDesc('created_at') as $comment)
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


