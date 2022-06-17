<div class="lg:flex lg:flex-auto lg:h-[100vh] overflow-hidden">
    
    @include('components.flash-session')
    
    <div class="lg:w-[40%] min-h-screen lg:pl-20 bg-[#F7F7FF] lg:min-w-[750px] ">
        <div class="w-full lg:p-20 p-10  pb-0 ">
            <h1 class="text-[#240F97] font-bold text-2xl">Klanten Lijst</h1>
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
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-50 " wire:click="search('firstname')" role="menuitem" tabindex="-1" id="menu-item-0">Voornaam</a>
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-50 " wire:click="search('infix')" role="menuitem" tabindex="-1" id="menu-item-0">Tussenvoegsel</a>
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-50 " wire:click="search('lastname')" role="menuitem" tabindex="-1" id="menu-item-0">Achternaam</a>
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-50 " wire:click="search('phonenumber')" role="menuitem" tabindex="-1" id="menu-item-0">Telefoon</a>
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-50 " wire:click="search('email')" role="menuitem" tabindex="-1" id="menu-item-0">Email</a>
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-50 " wire:click="search('address')" role="menuitem" tabindex="-1" id="menu-item-0">Address</a>
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-50 " wire:click="search('postcode')" role="menuitem" tabindex="-1" id="menu-item-0">Postcode</a>


                        </div>
                    </div>
                </div>

            </div>
            <div class="mt-14 text-xl w-full relative overflow-y-auto h-[80vh] pr-5 custom-scrollbar">
                
                @foreach ($clients as $client )

                    <div class="p-4 hover:cursor-pointer hover:opacity-60 rounded-lg " wire:click="selectClient({{$client->id}})">
                        <div class=" h-[6rem] flex flex-auto relative">
                            <h1 class="text-3xl my-auto font-bold text-[#240F97] w-[77px] text-center ">{{strtoupper(substr($client->firstname, -1))}}{{strtoupper(substr($client->lastname, -1))}}</h1>
                            <div class="border-l-[6px] border-l-[#D59FA0] ml-5 pl-4 w-full overflow-hidden">
                                <div clasgs="text-gray-400">{{$client->firstname}} {{$client->infix}} {{$client->lastname}}</div>
                                <div class="text-lg">
                                    <p class="truncate"><i class="fa-solid fa-envelope opacity-40 "></i> {{$client->email}} - <i class="fa-solid fa-phone opacity-40"></i> {{$client->phonenumber}}</p>
                                    <p class="truncate"><i class="fa-solid fa-house opacity-40"></i> {{$client->address}} - <i class="fa-solid fa-signs-post opacity-40"></i> {{$client->postcode}}</p>
                                </div>
                            </div>
                        </div>  
                    </div>

                @endforeach

            </div>
        </div>
    </div>
    <div class="lg:w-[60%] w-full min-h-screen">
        <div class="w-full lg:p-20 p-10 custom-scrollbar lg:h-[110vh] lg:overflow-y-auto">
            <h1 class="text-[#240F97] font-bold text-2xl">Klant Beheren</h1>
            <div class="h-[41.5vh] mt-6 w-full rounded border shadow-lg bg-[#F7F7FF]">
                <div class="p-10">
                    <h1 class="text-xl opacity-30 font-bold">Klant Aanmaken</h1>
                    <div>
                        <div class="grid grid-cols-3 gap-x-5">
                            <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600  mt-8 bg-white">
                                <label for="firstname" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900 rounded-lg">Voornaam</label>
                                <input type="text" wire:model="firstname" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" required>
                            </div>
                            <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600  mt-8 bg-white">
                                <label for="infix" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900 rounded-lg">Tussenvoegsel</label>
                                <input type="text" wire:model="infix" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" >
                            </div>
                            <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600  mt-8 bg-white">
                                <label for="lastname" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900 rounded-lg">Achternaam</label>
                                <input type="text" wire:model="lastname" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" required>
                            </div>
                        </div>
                        <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600  mt-8 bg-white">
                            <label for="email" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900 rounded-lg">Email (mijn@email.com)</label>
                            <input type="email" wire:model="email" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" >
                        </div>
                        <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600  mt-8 bg-white">
                            <label for="phonenumber" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900 rounded-lg">Telefoon Nummer (0612345678)</label>
                            <input type="tel" wire:model="phonenumber" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" >
                        </div>
                        <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600  mt-8 bg-white">
                            <label for="address" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900 rounded-lg">Address (Kriekenakker 54)</label>
                            <input type="text" wire:model="address" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" >
                        </div>
                        <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600  mt-8 bg-white">
                            <label for="postcode" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900 rounded-lg">Postcode (5066ml)</label>
                            <input type="text" wire:model="postcode" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" required>
                        </div>
                        <button wire:click="addClient" type="button" class="inline-flex float-right mt-10 items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"  data-dismiss="modal" ><i class="fa-solid fa-plus mr-2"></i> Toevoegen</button>

                    </div>
                </div>
            </div>
            <div class="h-[41.5vh] mt-10 w-full rounded border shadow-lg bg-[#F7F7FF]">
                <div class="p-10">
                    <h1 class="text-xl opacity-30 font-bold">Klant Aanpassen</h1>
                    <div>
                        <div class="grid grid-cols-3 gap-x-5">
                            <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600  mt-8 bg-white">
                                <label for="firstname" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900 rounded-lg">Voornaam</label>
                                <input type="text" wire:model="updateFirstname" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" required>
                            </div>
                            <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600  mt-8 bg-white">
                                <label for="infix" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900 rounded-lg">Tussenvoegsel</label>
                                <input type="text" wire:model="updateInfix" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" >
                            </div>
                            <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600  mt-8 bg-white">
                                <label for="lastname" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900 rounded-lg">Achternaam</label>
                                <input type="text" wire:model="updateLastname" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" required>
                            </div>
                        </div>
                        <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600  mt-8 bg-white">
                            <label for="email" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900 rounded-lg">Email (mijn@email.com)</label>
                            <input type="email" wire:model="updateEmail" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" >
                        </div>
                        <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600  mt-8 bg-white">
                            <label for="phonenumber" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900 rounded-lg">Telefoon Nummer (0612345678)</label>
                            <input type="tel" wire:model="updatePhonenumber" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" >
                        </div>
                        <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600  mt-8 bg-white">
                            <label for="address" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900 rounded-lg">Address (Kriekenakker 54)</label>
                            <input type="text" wire:model="updateAddress" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" >
                        </div>
                        <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600  mt-8 bg-white">
                            <label for="postcode" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900 rounded-lg">Postcode (5066ml)</label>
                            <input type="text" wire:model="updatePostcode" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" required>
                        </div>
                        
                        <div>
                            <button wire:click="updateClient()" type="button" class="inline-flex float-right mt-10 items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"  data-dismiss="modal" ><i class="fa-solid fa-pencil mr-2"></i> Aanpassen</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

