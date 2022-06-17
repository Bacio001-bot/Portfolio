<div class="lg:flex lg:flex-auto lg:h-[100vh] overflow-hidden">

    @include('components.flash-session')
    
    <div class="lg:w-[40%] lg:min-h-screen min-h-[24rem] lg:pl-20 bg-[#F7F7FF] lg:min-w-[750px] ">
        <div class="w-full lg:p-20 p-10  pb-0 ">
            <h1 class="text-[#240F97] font-bold text-2xl">Afspraken Checken</h1>
            <div>
                <div class="relative">
                    <label for="client_id" class="absolute top-[1.45rem] z-30 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">Klant</label>
                    <select wire:model="client_id" class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600 w-full mt-8">
                        @foreach ($clients as $client )
                            <option value="{{$client->id}}">{{$client->firstname}} {{$client->infix}}{{$client->lastname}} </option>
                        @endforeach
                    </select>
                </div>   
        
                <div class="relative">
                    <label for="treatment_id" class="absolute top-[1.45rem] z-30 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">Behandeling</label>
                    <select wire:model="treatment_id" class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600 w-full mt-8">
                        @foreach ($treatments as $treatment )
                            <option value="{{$treatment->id}}">{{$treatment->name}}</option>
                        @endforeach
                    </select>
                </div>   
            </div>

            <button wire:click="search()" type="button" class="inline-flex float-right mt-10 items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><i class="fa-solid fa-search mr-2"></i> Zoeken</button>
                
        </div>
    </div>
    <div class="lg:w-[60%] w-full min-h-screen">
        <div class="w-full lg:p-20 p-10 custom-scrollbar lg:h-[110vh] lg:overflow-y-auto">
            <h1 class="text-[#240F97] font-bold text-2xl">Afspraken Informatie</h1>
            <div class=" p-10 bg-[#F7F7FF] mt-10 rounded-lg border shadow-lg lg:h-[52vh] relative">
                <div class="relative">
                    <div class="w-full grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 lg:gap-x-20 gap-y-10 gap-10">
                        <div>
                            <h1 class=" font-bold text-gray-400 mb-2"><i class="fa-solid fa-clock mr-3 text-[#8CAECB]"></i>Tijd & Datum</h1>
                            <h1 class="">@if($agendaItem && ! empty($agendaItem->toArray()) && $agendaItem->appointments->count() != 0){{Carbon\Carbon::parse($agendaItem['date'])->format('l')}} {{Carbon\Carbon::parse($agendaItem['date'])->format('M')}} {{Carbon\Carbon::parse($agendaItem['date'])->format('d')}} - {{Carbon\Carbon::parse($agendaItem['time'])->format('H:i')}} 
                                @else Geen Data @endif</h1>
    
                        </div>
                        <div>
                            <h1 class=" font-bold text-gray-400 mb-2"><i class="fa-solid fa-street-view mr-3 text-[#BBDABB]"></i>Locatie</h1>
                            <h1 class="">@if($agendaItem && ! empty($agendaItem->toArray()) && $agendaItem->appointments->count() != 0){{$agendaItem->appointments[0]->client['address']}}  
                                @else Geen Data @endif</h1>
                        </div>
                        <div>
                            <h1 class=" font-bold text-gray-400 mb-2"><i class="fa-solid fa-signs-post mr-3 text-[#D4F200]"></i>Postcode</h1>
                            <h1 class="">@if($agendaItem && ! empty($agendaItem->toArray()) && $agendaItem->appointments->count() != 0){{$agendaItem->appointments[0]->client['postcode']}}   
                                @else Geen Data @endif</h1>                    
                        </div>
                        <div>
                            <h1 class=" font-bold text-gray-400 mb-2"><i class="fa-solid fa-tag mr-3 text-[#F28A9C]"></i>Naam</h1>
                            <h1 class="">@if($agendaItem && ! empty($agendaItem->toArray()) && $agendaItem->appointments->count() != 0){{$agendaItem->appointments[0]->client['firstname']}} {{$agendaItem->appointments[0]->client['infix']}} {{$agendaItem->appointments[0]->client['lastname']}} 
                                @else Geen Data @endif</h1>                    
                        </div>
                        <div>
                            <h1 class=" font-bold text-gray-400 mb-2"><i class="fa-solid fa-at mr-3 text-[#F1AC4D]"></i>Email</h1>
                            <h1 class="">@if($agendaItem && ! empty($agendaItem->toArray()) && $agendaItem->appointments->count() != 0){{$agendaItem->appointments[0]->client['email']}} 
                                @else Geen Data @endif</h1>                                        
                        </div>
                        <div>
                            <h1 class=" font-bold text-gray-400 mb-2"><i class="fa-solid fa-phone mr-3 text-[#F2F288]"></i>Telefoon</h1>
                            <h1 class="">@if($agendaItem && ! empty($agendaItem->toArray()) && $agendaItem->appointments->count() != 0){{$agendaItem->appointments[0]->client['phonenumber']}} 
                                @else Geen Data @endif</h1>                                     
                        </div>
                        <div>
                            <h1 class=" font-bold text-gray-400 mb-2"><i class="fa-solid fa-scissors mr-3 text-[#D59FA0]"></i>Behandeling</h1>
                            <h1 class="">@if($agendaItem && ! empty($agendaItem->toArray()) && $agendaItem->appointments->count() != 0){{$agendaItem->appointments[0]->treatment['name']}} 
                               @else Geen Data @endif</h1>                                      
                        </div>
                        <div>
                            <h1 class=" font-bold text-gray-400 mb-2"><i class="fa-solid fa-money-bill mr-3 text-[#F2D8D6]"></i>Prijs</h1>
                            <h1 class="">
                                @if($agendaItem && ! empty($agendaItem->toArray()) && $agendaItem->appointments->count() != 0)

                                    @php
                                        $price = 0;
                                    @endphp

                                    @foreach ($agendaItem->appointments as $appointment )
                                        
                                        @php
                                            $price = $price += $appointment->treatment['price'];
                                        @endphp

                                    @endforeach
                                    
                                    € {{$price}} 
                                
                                @else 
                                
                                    Geen Data 
                                
                                @endif</h1>                                      
                        </div>
                    </div>
            
                    <div class="mb-20">
                        <h1 class=" font-bold text-gray-400 mb-2 mt-10"><i class="fa-solid fa-align-center mr-3 text-[#D59FA0]"></i>Notities</h1>
                        <h1 class="lg:h-[11rem] lg:overflow-y-auto lg:custom-scrollbar">@if($agendaItem && ! empty($agendaItem->toArray()) && $agendaItem->appointments->count() != 0){{$agendaItem['notes']}} 
                           @else Geen Data @endif
                        </h1>            
                    </div>
 
                </div>
            </div>
        </div>
    </div>
</div>


