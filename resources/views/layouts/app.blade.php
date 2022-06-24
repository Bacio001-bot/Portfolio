<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />



    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        [x-cloak] {
            display: none !important;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 5px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: lightgray;
            border-radius: 25px;
        }
    </style>

    @livewireStyles

</head>

<body class=" font-sans h-screen max-w-screen bg-[#F9FAFB]">

    <div class="">
        @include('layouts.top-navigation')

        <div>
            <div class=" fixed w-auto h-[100vh] z-50">
                @include('layouts.navigation')
            </div>
            <div class="w-auto min-h-[100vh] ml-[88px] relative">
                <div class="bg-white shadow-sm ">
                    <h1 class="py-3 text-xl mx-auto max-w-7xl border-b">
                        <div class="flex-1  flex justify-between lg:mx-auto ">
                            <div class="flex-1 flex">
                                <form class="w-full flex md:ml-0" action="#" method="GET">
                                    <label for="search-field" class="sr-only">Search</label>
                                    <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                        <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none"
                                            aria-hidden="true">
                                            <svg class="h-5 w-5" x-description="Heroicon name: solid/search"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <input id="search-field" name="search-field"
                                            class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-0 focus:border-transparent sm:text-sm"
                                            placeholder="Search Panel" type="search">
                                    </div>
                                </form>
                            </div>
                            <div class="ml-4 flex items-center md:ml-6">
                                <button type="button"
                                    class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                                    <span class="sr-only">View notifications</span>
                                    <svg class="h-6 w-6" x-description="Heroicon name: outline/bell"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                        </path>
                                    </svg>
                                </button>

                                <!-- Profile dropdown -->
                                <div x-data="Components.menu({ open: false })" x-init="init()"
                                    @keydown.escape.stop="open = false; focusButton()" @click.away="onClickAway($event)"
                                    class="ml-3 relative">
                                    <div>
                                        <button type="button"
                                            class="max-w-xs bg-white rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 lg:p-2 lg:rounded-md lg:hover:bg-gray-50"
                                            id="user-menu-button" x-ref="button" @click="onButtonClick()"
                                            @keyup.space.prevent="onButtonEnter()"
                                            @keydown.enter.prevent="onButtonEnter()" aria-expanded="false"
                                            aria-haspopup="true" x-bind:aria-expanded="open.toString()"
                                            @keydown.arrow-up.prevent="onArrowUp()"
                                            @keydown.arrow-down.prevent="onArrowDown()">
                                            <img class="h-8 w-8 rounded-full"
                                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                                alt="">
                                            <span class="hidden ml-3 text-gray-700 text-sm font-medium lg:block"><span
                                                    class="sr-only">Open user menu for </span>Emilia Birch</span>
                                            <svg class="hidden flex-shrink-0 ml-1 h-5 w-5 text-gray-400 lg:block"
                                                x-description="Heroicon name: solid/chevron-down"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>

                                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                        x-transition:enter-start="transform opacity-0 scale-95"
                                        x-transition:enter-end="transform opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="transform opacity-100 scale-100"
                                        x-transition:leave-end="transform opacity-0 scale-95"
                                        class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                        x-ref="menu-items" x-description="Dropdown menu, show/hide based on menu state."
                                        x-bind:aria-activedescendant="activeDescendant" role="menu"
                                        aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                                        @keydown.arrow-up.prevent="onArrowUp()"
                                        @keydown.arrow-down.prevent="onArrowDown()" @keydown.tab="open = false"
                                        @keydown.enter.prevent="open = false; focusButton()"
                                        @keyup.space.prevent="open = false; focusButton()" style="display: none;">
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" x-state:on="Active"
                                            x-state:off="Not Active" :class="{ 'bg-gray-100': activeIndex === 0 }"
                                            role="menuitem" tabindex="-1" id="user-menu-item-0"
                                            @mouseenter="activeIndex = 0" @mouseleave="activeIndex = -1"
                                            @click="open = false; focusButton()">Your Profile</a>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700"
                                            :class="{ 'bg-gray-100': activeIndex === 1 }" role="menuitem" tabindex="-1"
                                            id="user-menu-item-1" @mouseenter="activeIndex = 1"
                                            @mouseleave="activeIndex = -1"
                                            @click="open = false; focusButton()">Settings</a>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700"
                                            :class="{ 'bg-gray-100': activeIndex === 2 }" role="menuitem" tabindex="-1"
                                            id="user-menu-item-2" @mouseenter="activeIndex = 2"
                                            @mouseleave="activeIndex = -1"
                                            @click="open = false; focusButton()">Logout</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </h1>
                    <h1 class="py-4 text-xl mx-auto max-w-7xl text-gray-500 font-semibold flex flex-auto gap-x-3">
                        @yield('title')
                        <div> > </div>
                        <div class="text-base mt-1">
                            @yield('subtitle')
                        </div>
                    </h1>
                </div>

                <div class="max-w-7xl mx-auto pt-[4rem] relative pb-16">
                    @yield('content')
                </div>
                <footer class="text-center text-gray-400 my-5 absolute bottom-0 left-0 right-0 ">© 2022 Bacio001 Development. All rights reserved.</footer>

            </div>
        </div>

    </div>

    @livewireScripts

</body>

</html>