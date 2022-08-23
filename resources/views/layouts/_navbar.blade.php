<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="{{ url('/') }}" class="flex text-xl font-bold items-center">
            <img src="{{ asset('images/logo_no_text.png') }}" style="max-height: 35px;">
            <div class="flex flex-col items-start ml-1">
                <p>
                    Heartbeat
                </p>
                <p class="text-rose-500 -mt-2">
                    Petition
                </p>
            </div>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 "
                aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
        </button>

        <div class="hidden w-full lg:block lg:w-auto" id="navbar-default">
            <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 lg:flex-row lg:space-x-8 lg:mt-0 lg:text-sm lg:font-medium lg:border-0 lg:bg-white ">
                <li>
                    <a href="{{ route('charts') }}"
                       class="transition duration-300 ease-in-out block py-2 pr-4 pl-3 rounded lg:p-0 @if(Route::currentRouteName() === 'charts') current-page @else hover:text-blue-500 @endif" >
                        Charts
                    </a>
                </li>
                @auth
                    @if(Auth::user()->isAdmin())
                        <li>
                            <a href="{{ route('dashboard') }}"
                               class="transition duration-300 ease-in-out block py-2 pr-4 pl-3 rounded lg:p-0 @if(Route::currentRouteName() === 'dashboard') current-page @else hover:text-blue-500 @endif" >
                                Dashboard
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('posts.index') }}"
                           class="transition duration-300 ease-in-out block py-2 pr-4 pl-3 rounded lg:p-0 @if(Route::currentRouteName() === 'posts.index') current-page @else hover:text-blue-500 @endif" >
                            หน้าหลัก
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tags.index') }}"
                           class="transition duration-300 ease-in-out block py-2 pr-4 pl-3 rounded lg:p-0 @if(Route::currentRouteName() === 'tags.index') current-page @else hover:text-blue-500 @endif" >
                            หัวข้อ/หน่วยงานที่รับผิดชอบ
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('posts.create') }}"
                           class="transition duration-300 ease-in-out block py-2 pr-4 pl-3 rounded lg:p-0 @if(Route::currentRouteName() === 'posts.create') current-page @else hover:text-blue-500 @endif">
                            + ส่งเรื่องร้องเรียน
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('my_posts')}}"
                               class="transition duration-300 ease-in-out block py-2 pr-4 pl-3 rounded lg:p-0 @if(Route::currentRouteName() === 'my_posts') current-page @else hover:text-blue-500 @endif">
                            ปัญหาที่แจ้ง
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="lg:my-0 my-2">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('ออกจากระบบ') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}"
                           class="transition duration-300 ease-in-out block py-2 pr-4 pl-3 rounded lg:p-0 @if(Route::currentRouteName() === 'login') current-page @else hover:text-blue-500 @endif" >
                            Login
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('register') }}"
                           class="transition duration-300 ease-in-out block py-2 pr-4 pl-3 rounded lg:p-0 @if(Route::currentRouteName() === 'register') current-page @else hover:text-blue-500 @endif" >
                            Register
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
