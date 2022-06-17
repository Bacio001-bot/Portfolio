<div class="bg-[#1F2E8B] h-full w-full hidden lg:block relative" >
    <ul class="text-3xl">
        <li class="p-5 px-3 mb-5 ">
            <img src="{{asset('img/logo.png')}}" class="h-[4rem] w-[4rem] p-3 rounded-full bg-[#1B1F80]" alt="">
        </li>
        <a href="{{route('agenda')}}">
            <li class="p-5 px-7 text-center hover:bg-[#1C207F] cursor-pointer @if(Route::is('agenda')) bg-[#1B1F80] @endif">
                <i class="fa-solid fa-calendar text-white"></i>
            </li>
        </a>
        <a href="{{route('clients')}}">
            <li class="p-5 px-7 text-center hover:bg-[#1C207F] cursor-pointer @if(Route::is('clients')) bg-[#1B1F80] @endif">
                <i class="fa-solid fa-person text-white"></i>
            </li>
        </a>
        <a href="{{route('treatments')}}">
            <li class="p-5 px-7 text-center hover:bg-[#1C207F] cursor-pointer @if(Route::is('treatments')) bg-[#1B1F80] @endif">
                <i class="fa-solid fa-briefcase text-white"></i>
            </li>
        </a>
        <a href="{{route('check')}}">
            <li class="p-5 px-7 text-center hover:bg-[#1C207F] cursor-pointer @if(Route::is('check')) bg-[#1B1F80] @endif">
                <i class="fa-solid fa-search text-white"></i>
            </li>
        </a>
        <a href="{{route('export')}}">
            <li class="p-5 px-7 text-center hover:bg-[#1C207F] cursor-pointer @if(Route::is('export')) bg-[#1B1F80] @endif" >
                <i class="fa-solid fa-file-export text-white"></i>
            </li>
        </a>
        <a href="{{route('logout')}}">
            <li class="p-5 px-7 text-center hover:bg-[#1C207F] cursor-pointer absolute bottom-0" >
                <i class="fa-solid fa-arrow-right-from-bracket text-white"></i>
            </li>
        </a>
    </ul>
    
</div>