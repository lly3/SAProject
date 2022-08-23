@extends('layouts.main')

@section('content')
    <style>
        .-z-1 {
            z-index: -1;
        }

        .origin-0 {
            transform-origin: 0%;
        }

        input:focus ~ label,
        input:not(:placeholder-shown) ~ label,
        textarea:focus ~ label,
        textarea:not(:placeholder-shown) ~ label,
        select:focus ~ label,
        select:not([value='']):valid ~ label {
            /* @apply transform; scale-75; -translate-y-6; */
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            transform: translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
            --tw-scale-x: 0.75;
            --tw-scale-y: 0.75;
            --tw-translate-y: -1.5rem;
        }

        input:focus ~ label,
        select:focus ~ label {
            /* @apply text-black; left-0; */
            --tw-text-opacity: 1;
            color: rgba(0, 0, 0, var(--tw-text-opacity));
            left: 0px;
        }
    </style>

    <div class="min-h-screen p-0 sm:p-6">
        <div class="mx-auto w-full px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
            <form id="form" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="flex justify-evenly gap-x-6 flex-col md:flex-row">
                    <div class='leftside md:w-1/2 w-full'>
                        <div id="default-carousel" class="relative overflow-hidden bg-gray-300 rounded-lg" data-carousel="static">
                            <!-- Carousel wrapper -->
                            <div id="carousel-wrapper" class="h-96 flex" data-slice-index=0>
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
                        <div class="my-3">
                            <input class="form-control
                            block
                            w-full
                            px-2
                            py-1
                            text-sm
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded-lg
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file"
                                   id="browse" name="images[]" multiple>
                        </div>
                    </div>
                    <div class='rightside'>
                        <h1 class="text-2xl font-bold mb-8">แบบฟอร์มแจ้งเรื่องร้องเรียน</h1>
                        <div class="relative z-0 w-full mb-5">
                            <input
                                type="text"
                                name="title"
                                placeholder=" "
                                required
                                class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                            />
                            <label for="title" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">หัวข้อเรื่องร้องเรียน*</label>
                            <span class="text-sm text-red-600 hidden" id="error">กรุณาใส่หัวข้อเรื่องร้องเรียน</span>
                        </div>

                        <div class="relative z-0 w-full mb-5">
                            <textarea
                                name="description"
                                placeholder=""
                                rows="2"
                                cols="50"
                                required
                                class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                            ></textarea>
                            <label for="description" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">รายละเอียดการร้องเรียน*</label>
                            <span class="text-sm text-red-600 hidden" id="error">กรุณาใส่รายละเอียดการร้องเรียน</span>
                        </div>
                        <div class="relative z-0 w-full mb-5">
                            <input
                                type="text"
                                name="tags"
                                placeholder=" "
                                required
                                class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                            />
                            <label for="tags" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">หัวข้อที่เกียวข้อง* (คั่นด้วย comma)</label>
                            <span class="text-sm text-red-600 hidden" id="error">กรุณาใส่หัวข้อที่เกี่ยวข้อง</span>
                        </div>
                        <div class="relative z-0 w-full mb-5">
                            <input
                                type="text"
                                name="penname"
                                placeholder=" "
                                class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                            />
                            <label for="penname" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">นามแฝง</label>
                            <span class="text-sm text-red-600 hidden" id="error">กรุณาใส่นามแฝง</span>
                        </div>
                        <div class="relative z-0 w-full mb-5">
                            <input
                                type="text"
                                name="contact"
                                placeholder=" "
                                class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                            />
                            <label for="contact" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">ข้อมูลติดต่อ</label>
                            <span class="text-sm text-red-600 hidden" id="error">กรุณาใส่ข้อมูลติดต่อ</span>
                        </div>
                        <div class="flex flex-col space-x-0 md:flex-row md:space-x-4">
                            <div class="relative z-0 w-full mb-5">
                                <select
                                    name="select"
                                    value=""
                                    required
                                    onclick="this.setAttribute('value', this.value);"
                                    class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                                >
                                    <option value="" selected disabled hidden></option>
                                    @foreach(\App\Models\Organization::get() as $organization)
                                        <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                                    @endforeach
                                    {{--
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                        <option value="4">Option 4</option>
                                        <option value="5">Option 5</option>
                                     --}}

                                </select>
                                <label for="select" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">เลือกหน่วยงานที่รับผิดชอบ*</label>
                                <span class="text-sm text-red-600 hidden"
                                      id="error">กรุณาเลือกหน่วยงานที่รับผิดชอบ</span>
                            </div>
                        </div>
                        <button
                            id="button"
                            type="submit"
                            class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-pink-500 hover:bg-pink-600 hover:shadow-lg focus:outline-none"
                        >
                            ส่งคำร้องเรียน
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        'use strict'

        document.getElementById('next-button').addEventListener('click', () => {
            const wrapper = document.getElementById('carousel-wrapper');
            const sliceIndex = parseInt(wrapper.getAttribute('data-slice-index'));

            if(sliceIndex < wrapper.children.length - 1) {
                calculateTranslate(sliceIndex + 1);
            }
        })

        document.getElementById('prev-button').addEventListener('click', () => {
            const wrapper = document.getElementById('carousel-wrapper');
            const sliceIndex = parseInt(wrapper.getAttribute('data-slice-index'));

            if(sliceIndex > 0 ) {
                calculateTranslate(sliceIndex - 1);
            }
        })

        document.getElementById('browse').addEventListener('change', (e) => {
            removeAllChild(document.getElementById('carousel-wrapper'));
            for(let i = 0; i < e.target.files.length; ++i) {
                const div = document.createElement('div');
                const image = document.createElement('img');

                div.className = "duration-700 ease-in-out grow-0 shrink-0 basis-full z-10";
                image.className = "block h-full object-contain mx-auto";
                image.src = URL.createObjectURL(e.target.files[i]);

                div.append(image);

                document.getElementById('carousel-wrapper').append(div);
            }
            calculateTranslate(0);
        })

        function calculateTranslate(sliceIndex) {
            const wrapper = document.getElementById('carousel-wrapper');
            wrapper.setAttribute('data-slice-index', sliceIndex);
            wrapper.style.cssText = "transform: translateX(-" + (sliceIndex * 100) + "%); transition: ease-in-out transform .7s;";
        }

        function removeAllChild(node) {
            while (node.firstChild) {
                node.removeChild(node.lastChild);
            }
        }

        document.getElementById('button').addEventListener('click', toggleError)
        const errMessages = document.querySelectorAll('#error')

        function toggleError() {
            // Show error message
            errMessages.forEach((el) => {
                if (el.parentNode.firstElementChild.value == '' && el.parentNode.firstElementChild.getAttribute('required') != null)
                    el.classList.remove('hidden')
                else
                    el.classList.add('hidden');
            })

            // Highlight input and label with red
            const allBorders = document.querySelectorAll('.border-gray-200')
            const allTexts = document.querySelectorAll('.text-gray-500')
            allBorders.forEach((el) => {
                if (el.parentNode.firstElementChild.value == '' && el.parentNode.firstElementChild.getAttribute('required') != null)
                    el.classList.add('border-red-600')
                else
                    el.classList.remove('border-red-600')
            })
            allTexts.forEach((el) => {
                if (el.parentNode.firstElementChild.value == '' && el.parentNode.firstElementChild.getAttribute('required') != null)
                    el.classList.add('text-red-600')
                else
                    el.classList.remove('text-red-600')
            })
        }

    </script>

@endsection
