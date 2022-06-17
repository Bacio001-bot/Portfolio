<div class="" x-data="{open: false}">
    <div class="bg-[#1F2E8B] p-3 w-full block lg:hidden" >
        <div class="flex flex-auto ml-5">
            <img src="{{asset('img/logo.png')}}" class="h-[4rem] w-[4rem] p-2 rounded-full bg-[#1B1F80]" alt=""/>
            <h1 class="text-white font-bold my-auto ml-2 text-2xl italic underline-offset-2  underline">Ingrid Kapster</h1>
        </div>
        <i class="fa-solid fa-list text-white absolute right-10 text-3xl  top-6  " x-on:click="open = ! open"></i>
    </div>
    
    <ul x-cloak x-show="open" class="w-full absolute bg-[#1B1F80] z-50" x-transition.duration.400ms>
        <a href="{{route('agenda')}}">
            <li class="flex flex-auto  p-6 border-t border-white border-opacity-50">
                <i class="fa-solid fa-calendar text-2xl text-white"></i> <h1 class="ml-4 text-xl mt-0.5 font-bold text-white">Agenda</h1>
            </li>
        </a>
        <a href="{{route('clients')}}">
            <li class="flex flex-auto  p-6 border-t border-white border-opacity-50">
                <i class="fa-solid fa-person text-2xl text-white"></i> <h1 class="ml-4 text-xl mt-0.5 font-bold text-white">Klanten</h1>
            </li>
        </a>
        <a href="{{route('treatments')}}">
            <li class="flex flex-auto  p-6 border-t border-white border-opacity-50">
                <i class="fa-solid fa-briefcase text-2xl text-white"></i> <h1 class="ml-4 text-xl mt-0.5 font-bold text-white">Behandelingen</h1>
            </li>
        </a>
        <a href="{{route('check')}}">
            <li class="flex flex-auto  p-6 border-t border-white border-opacity-50">
                <i class="fa-solid fa-search text-2xl text-white"></i> <h1 class="ml-4 text-xl mt-0.5 font-bold text-white">Check</h1>
            </li>
        </a>
        <a href="{{route('logout')}}">
            <li class="flex flex-auto  p-6 border-t border-white border-opacity-50">
                <i class="fa-solid fa-arrow-right-from-bracket text-white text-2xl"></i> <h1 class="ml-4 text-xl mt-0.5 font-bold text-white">Uitloggen</h1>
            </li>
        </a>
    </ul>
</div>