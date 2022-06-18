<div class="w-full min-h-screen flex flex-auto h-screen">
    <div class="w-[37.5rem] border-x-2 overflow-y-auto custom-scrollbar" id="tweetDisplay">
        <h1 class="p-4 text-xl font-semibold">Home</h1>
        <div class="px-4 pb-4 w-full border-b-2" >
            <div class="flex flex-auto">
                <div class="p-2 w-[56px] h-[56px] rounded-full  bg-[#A1D3F7] text-center">
                    <i class="fa-solid fa-egg text-4xl text-white"></i>
                </div>
                <div class="ml-4">
                    <div class="w-[30rem] flex flex-auto">
                        <div class="mt-1 border-b border-gray-300 focus-within:border-[#D1D5DB]">
                          <textarea wire:model="tweetText" type="text" name="name" maxlength="250" id="myTextarea" oninput="auto_grow(this)"  class="no-scrollbar resize-none overflow-none block w-[26rem] border-0 border-b focus:border-[#D1D5DB] border-transparent focus:ring-0 text-2xl" placeholder="What's happening?"></textarea>
                        </div>
                        <button wire:click="sendTweet" class="w-[3rem] ml-[1rem] h-[3rem] mt-[0.3rem] hover:bg-[#3AABF4] bg-[#8ECDF7] rounded-lg text-white "><i class="fa-solid fa-paper-plane"></i></button>
                    </div>        
                    <div class="w-[26rem] relative">
                        <p id="textareaLength" class="text-sm text-gray-400"></p>

                        @error('tweetText')
                            <p class="text-red-500 text-sm absolute right-0 top-0">{{ $message }}</p>
                        @enderror

                        @if (session()->has('sendTweetSuccess'))
                            <p class="text-green-500 text-sm absolute right-0 top-0">{{session('sendTweetSuccess')}}</p>
                        @endif 

                    </div> 
                </div>
            </div>
            <div class="w-full pt-10">
                <div class="mx-auto grid-cols-2 grid gap-x-24 px-12">
                    <button wire:click="filterTweets('all')" class="p-2 text-sm cursor-pointer hover:bg-[#3AABF4] py-0.5 bg-[#8ECDF7] rounded-2xl text-white font-semibold ">
                        All Tweets
                    </button>
                    <button wire:click="filterTweets('my')" class="p-2 text-sm cursor-pointer hover:bg-[#3AABF4] py-0.5 bg-[#8ECDF7] rounded-2xl text-white font-semibold ">
                        My Tweets
                    </button>
                </div>
            </div>

        </div>
        @foreach($tweets as $tweet)
            <div class="border-b p-5 pb-10" x-data="{replies: false, reply: false}">
                <div class="flex flex-auto gap-x-3">
                    <img class="h-[50px] w-[50px] rounded-full" src="{{$tweet->user->profile_image}}" alt="">
                    <div class="mb-2">
                        <h1 class=" font-bold">{{$tweet->user->name}} </h1>
                        <h1 class="text-sm">{{Carbon\Carbon::parse($tweet->created_at)->format('l')}} {{Carbon\Carbon::parse($tweet->created_at)->format('M')}} {{Carbon\Carbon::parse($tweet->created_at)->format('d')}} - {{Carbon\Carbon::parse($tweet->created_at)->format('H')}}:{{Carbon\Carbon::parse($tweet->created_at)->format('m')}}</h1>

                    </div>
                </div>
                <div class="flex flex-auto">
                    <div class="px-5 pr-10 w-[2rem] mt-2">
                        @if(!empty($tweet->replies->toArray()))
                            <div class="bg-gray-200 h-full w-[0.2rem]" x-show="replies"></div>
                        @endif
                    </div>
                    <div>
                        <p class="w-[490px]">
                            {{$tweet->description}} 
                        </p> 
                        <div class="w-full relative">
                            <div class="flex flex-auto text-2xl gap-x-5 float-right mt-5 text-gray-300">
                                <i @click="reply = ! reply" class="fa-solid fa-reply text-gray-600"></i>
                                <i wire:click="likeTweet({{$tweet->id}})" class="fa-solid fa-heart @if($tweet->likes->filter(function ($item) { return $item->user_id == 1; })->first()) text-pink-600 @endif"></i>
                                <i wire:click="favoriteTweet({{$tweet->id}})" class="fa-solid fa-star @if($tweet->favorites->filter(function ($item) { return $item->user_id == 1; })->first()) text-yellow-400 @endif" ></i>
                            </div>
                            @if(!empty($tweet->replies->toArray()))
                            <p @click="replies = ! replies" class="p-2 text-sm cursor-pointer hover:bg-[#3AABF4] absolute left-1/2 transform -translate-x-1/2 mt-5 -ml-[2rem] py-0.5 bg-[#8ECDF7] rounded-2xl text-white font-semibold "> <span x-show="!replies">Show</span><span x-show="replies">Hide</span> Replies </p>
                            @endif
                        </div>
                        <div class="pt-14" x-show="reply">
                            <div class="ml-4">
                                <div class="w-[30rem] flex flex-auto">
                                    <div class="mt-1 border-b border-gray-300 focus-within:border-[#D1D5DB]">
                                      <textarea wire:model="tweetReply" type="text" name="name" maxlength="250" id="myTextarea" oninput="auto_grow(this)"  class="no-scrollbar resize-none overflow-none block w-[26rem] border-0 border-b focus:border-[#D1D5DB] border-transparent focus:ring-0 text-2xl" placeholder="What's happening?"></textarea>
                                    </div>
                                    <button wire:click="sendReply({{$tweet->id}})" class="w-[3rem] ml-[1rem] h-[3rem] mt-[0.3rem] hover:bg-[#3AABF4] bg-[#8ECDF7] rounded-lg text-white "><i class="fa-solid fa-reply"></i></button>
                                </div>        
                                <div class="w-[26rem] relative">
                                    <p id="textareaLength" class="text-sm text-gray-400"></p>
            
                                    @error('tweetReply')
                                        <p class="text-red-500 text-sm absolute right-0 top-0">{{ $message }}</p>
                                    @enderror
            
                                    @if (session()->has('sendTweetReplySuccess'))
                                        <p class="text-green-500 text-sm absolute right-0 top-0">{{session('sendTweetReplySuccess')}}</p>
                                    @endif 
            
                                </div> 
                            </div>
                        </div>
                        <div class="pt-14" x-show="replies">
                            @foreach ( $tweet->replies as $reply )
                            
                            <div class="">
                                <div class="flex flex-auto gap-x-3 pr-5 py-5">
                                    <img class="h-[50px] w-[50px] rounded-full" src="{{$reply->user->profile_image}}" alt="">
                                    <div class="mb-2">
                                        <h1 class=" font-bold">{{$reply->user->name}} </h1>
                                        <h1 class="text-sm">{{Carbon\Carbon::parse($reply->created_at)->format('l')}} {{Carbon\Carbon::parse($reply->created_at)->format('M')}} {{Carbon\Carbon::parse($reply->created_at)->format('d')}} - {{Carbon\Carbon::parse($reply->created_at)->format('H')}}:{{Carbon\Carbon::parse($reply->created_at)->format('m')}}</h1>
                
                                    </div>
                                </div>
                                
                                <div class="flex flex-auto ">
                                    <div class="px-5 pr-10 w-[2rem] mt-2">
                                        <div class="bg-gray-200 h-full w-[0.2rem]"></div>
                                    </div>
                                    <p>
                                        {{$reply->description}} 
                                    </p> 
                                </div>
                            
                            </div>

                        @endforeach
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
