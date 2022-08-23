@extends('layouts.main')

@section('content')
    <section class="md:mx-8 mx-0">
        <h1 class="md:text-3xl text-2xl mx-4 mt-6">
            หน่วยงานที่รับผิดชอบทั้งหมด
        </h1>
        <div class="my-1 px-8 py-2 flex flex-wrap justify-start gap-4">
            @foreach($organizations as $organization)
                <a href="{{ route('tags.organization.show', ['tag' => $organization->name]) }}"
                   class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 w-full md:w-auto">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                        {{ $organization->name }}
                    </h5>
                    <p class="bg-orange-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 gap-[5px]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                            <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        {{ $organization->posts->count() }} คำร้องเรียน
                    </p>
                </a>
            @endforeach
        </div>
        <h1 class="md:text-3xl text-2xl mx-4 mt-6">
            หัวข้อที่เกี่ยวข้องทั้งหมด
        </h1>
        <div class="my-1 px-8 py-2 flex flex-wrap justify-start gap-4">
            @foreach($tags as $tag)
                <a href="{{ route('tags.show', ['tag' => $tag->name]) }}"
                   class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 w-full md:w-auto">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                        {{ $tag->name }}
                    </h5>
                    <p class="bg-orange-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 gap-[5px]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                            <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        {{ $tag->posts->count() }} posts
                    </p>
                </a>
            @endforeach
        </div>
    </section>



@endsection
