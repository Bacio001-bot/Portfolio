<div class="w-full min-h-screen flex flex-auto h-screen">
    <div class="w-[37.5rem] border-x-2 overflow-y-auto custom-scrollbar" id="tweetDisplay">
        <h1 class="p-4 text-xl font-semibold">Liked</h1>
        <div class="px-4 pb-4 w-full border-b-2" >

        </div>
        @foreach($liked as $like)
        <div class="border-b p-5 pb-10" >
            <div class="flex flex-auto gap-x-3">
                <img class="h-[50px] w-[50px] rounded-full" src="{{$like->tweet->user->profile_image}}" alt="">
                <div class="mb-2">
                    <h1 class=" font-bold">{{$like->tweet->user->name}} </h1>
                    <h1 class="text-sm">{{Carbon\Carbon::parse($like->tweet->created_at)->format('l')}} {{Carbon\Carbon::parse($like->tweet->created_at)->format('M')}} {{Carbon\Carbon::parse($like->tweet->created_at)->format('d')}} - {{Carbon\Carbon::parse($like->tweet->created_at)->format('H')}}:{{Carbon\Carbon::parse($like->tweet->created_at)->format('m')}}</h1>

                </div>
            </div>
            <div class="flex flex-auto">
                <div class="px-5 pr-10 w-[2rem] mt-2"></div>
                <div>
                    <p class="w-[490px]">
                        {{$like->tweet->description}} 
                    </p> 
                    <div class="w-full relative">
                        <div class="flex flex-auto text-2xl gap-x-5 float-right mt-5 text-gray-300">
                            <i wire:click="likeTweet({{$like->tweet->id}})" class="fa-solid fa-heart @if($like->tweet->likes->filter(function ($item) { return $item->user_id == 1; })->first()) text-pink-600 @endif" ></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
        <p wire:click="$emit('load-more')" class="p-2 text-center">Load More...</p>
    </div>
    <div class="w-[25rem] overflow-y-auto ">
    </div>
</div>

<script src="{{ asset('js/textarea.js') }}" defer></script>
