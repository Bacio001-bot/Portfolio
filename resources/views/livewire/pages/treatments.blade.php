<div class="lg:flex lg:flex-auto lg:h-[100vh] overflow-hidden">
    
    @include('components.flash-session')
    
    <div class="lg:w-[40%] min-h-screen lg:pl-20 bg-[#F7F7FF] lg:min-w-[750px] ">
        <div class="w-full lg:p-20 p-10  pb-0 ">
            <h1 class="text-[#240F97] font-bold text-2xl">Behandelingen Lijst</h1>
            <div class="relative mt-5 flex flex-auto ">

                <input type="text" wire:model="search" class="bg-gray-50 border border-r-0 border-gray-300 text-gray-900 sm:text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                      </svg>
                </div>

                <div class="relative inline-block text-left float-right border border-gray-300  rounded-r-lg" x-data="{filterOpen: false}">
                    <div class="p-2.5 hover:cursor-pointer"  x-on:click="filterOpen = ! filterOpen" x-on:click.away="filterOpen = false">
                        <button type="button" class="bg-gray-100 rounded-full flex items-center text-gray-400 hover:opacity-60" id="menu-button" aria-expanded="true" aria-haspopup="true">
                            <span class="sr-only">Open options</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                        </button>
                    </div>
                
    
                    <div x-show="filterOpen" class="origin-top-right z-30 absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-50 " wire:click="search('name')" role="menuitem" tabindex="-1" id="menu-item-0">Naam</a>
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-50 " wire:click="search('price')" role="menuitem" tabindex="-1" id="menu-item-0">Prijs</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="mt-14 text-xl w-full relative overflow-y-auto h-[80vh] pr-5 custom-scrollbar">
                
                @php
                    $i = 1;
                @endphp
                @foreach ($treatments as $treatment )

                    <div class="p-4 hover:cursor-pointer hover:opacity-60 rounded-lg" wire:click="selectTreatment({{$treatment->id}})">
                        <div class=" h-[4rem] flex flex-auto relative">
                            <h1 class="text-3xl my-auto font-bold text-[#240F97] w-[77px] text-center ">{{$i}}</h1>
                            <div class="border-l-[6px] border-l-[#D59FA0] ml-5 pl-4 w-full overflow-hidden">
                                <div clasgs="text-gray-400">{{$treatment->name}}</div>
                                <div class="text-lg">
                                    <p class="truncate"><i class="fa-solid fa-tag opacity-40"></i> €{{$treatment->price}}</p>
                                </div>
                            </div>
                        </div>  
                    </div>
                    @php
                        $i = $i + 1;
                    @endphp
                @endforeach

            </div>
        </div>
    </div>
    <div class="lg:w-[60%] w-full min-h-screen">
        <div class="w-full lg:p-20 p-10 custom-scrollbar lg:h-[110vh] lg:overflow-y-auto">
            <h1 class="text-[#240F97] font-bold text-2xl">Behandelingen Aanmaken</h1>
            <div class="h-[41.5vh] mt-6 w-full rounded border shadow-lg bg-[#F7F7FF]">
                <div class="p-10">
                    <h1 class="text-xl opacity-30 font-bold">Behandelingen Aanmaken</h1>
                    <div>

                        <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600  mt-8 bg-white">
                            <label for="name" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900 rounded-lg">Name</label>
                            <input type="text" wire:model="name" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" >
                        </div>
                        <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600  mt-8 bg-white">
                            <label for="price" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900 rounded-lg">Prijs (5,50)</label>
                            <input type="number" wire:model="price" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" >
                        </div>
   
                        <button wire:click="addTreatment" type="button" class="inline-flex float-right mt-10 items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"  data-dismiss="modal" ><i class="fa-solid fa-plus mr-2"></i> Toevoegen</button>

                    </div>
                </div>
            </div>
            <div class="h-[41.5vh] mt-10 w-full rounded border shadow-lg bg-[#F7F7FF]">
                <div class="p-10">
                    <h1 class="text-xl opacity-30 font-bold">Behandelingen Aanpassen</h1>
                    <div>

                        <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600  mt-8 bg-white">
                            <label for="name" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900 rounded-lg">Name</label>
                            <input type="text" wire:model="updateName" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" >
                        </div>
                        <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600  mt-8 bg-white">
                            <label for="price" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900 rounded-lg">Prijs (5,50)</label>
                            <input type="number" wire:model="updatePrice" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" >
                        </div>

                        <div>
                            <button wire:click="updateTreatment()" type="button" class="inline-flex float-right mt-10 items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"  data-dismiss="modal" ><i class="fa-solid fa-pencil mr-2"></i> Aanpassen</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

