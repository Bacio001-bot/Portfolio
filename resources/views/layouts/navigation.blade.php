<div class=" h-full w-full hidden lg:block" >
    <div class="h-[5rem]">
        <i class="fa-brands fa-twitter text-[2rem] mt-3 float-left text-[#1D9BF0] "></i>

    </div>
    <div>
        <ul class="w-full grid gap-y-5 pr-5 -ml-3">
            <a href="{{route('home')}}">
                <li class="text-xl cursor-pointer flex flex-auto gap-x-4 hover:bg-gray-100 p-3 rounded-full ">
                    <i class="fa-solid fa-house text-[1.6rem] text-gray-800"></i>
                    <h1 class="font-semibold text-[1.4rem] text-gray-500">Home</h1>
                </li>
            </a>
            <a href="{{route('liked')}}">
                <li class="text-xl cursor-pointer flex flex-auto gap-x-4 hover:bg-gray-100 p-3 rounded-full ">
                    <i class="fa-solid fa-thumbs-up text-[1.6rem] text-gray-800"></i>
                    <h1 class="font-semibold text-[1.4rem] text-gray-500">Liked</h1>
                </li>
            </a>
            <a href="{{route('favorites')}}">
                <li class="text-xl cursor-pointer flex flex-auto gap-x-4 hover:bg-gray-100 p-3 rounded-full ">
                    <i class="fa-solid fa-star text-[1.6rem] text-gray-800"></i>
                    <h1 class="font-semibold text-[1.4rem] text-gray-500">Favorites</h1>
                </li>
            </a>
            <li class="text-xl cursor-pointer flex flex-auto gap-x-4 hover:bg-gray-100 p-3 rounded-full ">
                <i class="fa-solid fa-user text-[1.6rem] text-gray-800"></i>
                <h1 class="font-semibold text-[1.4rem] text-gray-500">Profile</h1>
            </li>
        </ul>
        
    </div>
</div>