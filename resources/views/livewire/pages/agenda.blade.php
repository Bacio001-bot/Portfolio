<div class="lg:flex lg:flex-auto lg:h-[100vh] overflow-hidden">
    
    @include('components.flash-session')

    <div class="lg:w-[40%] min-h-screen lg:pl-20 bg-[#F7F7FF] lg:min-w-[750px] ">
        <div class="w-full lg:p-20 p-10  pb-0 ">
            <h1 class="text-[#240F97] font-bold text-2xl">Selecteer Datum</h1>
            <div class="relative mt-5">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                </div>

                <x-date-picker wire:model.lazy="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
            </div>

            <div class=" mt-20 text-xl text-gray-400 w-full relative h-[2rem]">
                <i class="fa-solid fa-angle-left  absolute left-0 cursor-pointer" wire:click="removeDay"></i>
                <div class=" absolute left-1/2 transform -translate-x-1/2 flex flex-auto -mt-1.5  ">
                    <h1>{{Carbon\Carbon::parse($date)->format('l')}}</h1> <h1 class="mx-4">{{Carbon\Carbon::parse($date)->format('M')}}</h1> <h1>{{Carbon\Carbon::parse($date)->format('d')}}</h1>
                </div>
                <i class="fa-solid fa-angle-right absolute right-0 cursor-pointer" wire:click="addDay"></i>
            </div>

            <div class="mt-14 text-xl w-full relative overflow-y-auto h-[65vh] pr-5 custom-scrollbar">
                
                @foreach ($agendas as $agenda )
                    @if($agenda->appointments->count() != 0)
                    <div class="p-4 hover:cursor-pointer hover:opacity-60 rounded-lg @if($agendaSelectedItem && $agendaSelectedItem['time'] == $agenda->time) bg-white border border-gray-300 @elseif($selectedAgenda && $agenda->time == $selectedAgenda->time) bg-blue-50 @endif " wire:click="selectAgendaItem({{$agenda}})">
                        <div class=" h-[4rem] flex flex-auto relative">
                            <h1 class="text-3xl my-auto font-bold text-[#240F97]">{{\Carbon\Carbon::createFromFormat('H:i:s',$agenda['time'])->format('H:i')}}</h1>
                            <div class="border-l-[6px] @if($agenda->finished) border-l-[#a7d59f] @else border-l-[#D59FA0] @endif ml-5 pl-4 w-full overflow-hidden">
                                <div clasgs="text-gray-400">{{$agenda->appointments[0]->client->firstname}} {{$agenda->appointments[0]->client->infix}} {{$agenda->appointments[0]->client->lastname}}</div>
                                <div class="text-lg">
                                    <p class="truncate">{{$agenda->appointments[0]->treatment->name}} - @if($agenda->notes){{$agenda->notes}}@endif</p>
                                </div>
                            </div>
                        </div>  
                    </div>

                    @endif
                @endforeach
            </div>

            <button class="p-5 px-7 text-center bg-[#1F2E8B] w-full mt-5 text-white text-xl rounded-lg hover:bg-[#1C207F] cursor-pointer"  wire:click='$emit("openModal", "modals.agenda-aanmaken")'>
                Afspraak Aanmaken
            </button>

        </div>
    </div>
    <div class="lg:w-[60%] w-full min-h-screen">
        <div class="w-full lg:p-20 p-10 custom-scrollbar lg:h-[110vh] lg:overflow-y-auto">
            <h1 class="text-[#240F97] font-bold text-2xl">Afspraak Informatie</h1>

            <div class="lg:flex lg:flex-auto mt-6 lg:gap-x-5">
                <div wire:ignore class="h-[400px] lg:w-[50%] w-full rounded border shadow-lg bg-[#F7F7FF]" id="map"></div>
                <div class="lg:w-[50%] mt-10 lg:mt-0 w-full h-[400px] border shadow-lg bg-[#F7F7FF] overflow-y-auto custom-scrollbar ">
                    @php
                        $agenda = null;
                    @endphp
                    @if($agendaSelectedItem)
                        @php
                            $agenda = $agendaSelectedItem;
                        @endphp
                    @elseif($selectedAgenda)
                        @php
                            $agenda = $selectedAgenda;
                        @endphp
                    @else
                    @endif

                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-100">
                          <tr class="divide-x divide-gray-200">
                            <th scope="col" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Naam</th>
                            <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Behandeling</th>
                            
                          </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white border-b">
                            @if($agenda)
                                @foreach ($agenda->appointments as $appointment)
                                    <tr class="divide-x divide-gray-200 border-y ">
                                            <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">{{$appointment->client['firstname']}} {{$appointment->client['infix']}} {{$appointment->client['lastname']}}</td>
                                            <td class="whitespace-nowrap p-4 text-sm text-gray-500">{{$appointment->treatment['name']}}</td>
                                    </tr>
                                @endforeach
                            @endif
                          <!-- More people... -->
                        </tbody>
                      </table>
                </div>
            </div>
            
            <div class=" p-10 bg-[#F7F7FF] mt-10 rounded-lg border shadow-lg lg:h-[52vh] relative">
                <div class="relative">
                    <div class="w-full grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 lg:gap-x-20 gap-y-10 gap-10">
                        <div>
                            <h1 class=" font-bold text-gray-400 mb-2"><i class="fa-solid fa-clock mr-3 text-[#8CAECB]"></i>Tijd & Datum</h1>
                            <h1 class="">@if($agendaSelectedItem && ! empty($agendaSelectedItem->toArray()) && $agendaSelectedItem->appointments->count() != 0){{Carbon\Carbon::parse($agendaSelectedItem['date'])->format('l')}} {{Carbon\Carbon::parse($agendaSelectedItem['date'])->format('M')}} {{Carbon\Carbon::parse($agendaSelectedItem['date'])->format('d')}} - {{Carbon\Carbon::parse($agendaSelectedItem['time'])->format('H:i')}} 
                                @elseif($selectedAgenda && ! empty($selectedAgenda->toArray()) && $selectedAgenda->appointments->count() != 0) {{Carbon\Carbon::parse($selectedAgenda['date'])->format('l')}} {{Carbon\Carbon::parse($selectedAgenda['date'])->format('M')}} {{Carbon\Carbon::parse($selectedAgenda['date'])->format('d')}} - {{Carbon\Carbon::parse($selectedAgenda['time'])->format('H:i')}}  @else Geen Data @endif</h1>
    
                        </div>
                        <div>
                            <h1 class=" font-bold text-gray-400 mb-2"><i class="fa-solid fa-street-view mr-3 text-[#BBDABB]"></i>Locatie</h1>
                            <h1 class="">@if($agendaSelectedItem && ! empty($agendaSelectedItem->toArray()) && $agendaSelectedItem->appointments->count() != 0){{$agendaSelectedItem->appointments[0]->client['address']}}  
                                @elseif($selectedAgenda && ! empty($selectedAgenda->toArray()) && $selectedAgenda->appointments->count() != 0) {{$selectedAgenda->appointments[0]->client['address']}}  @else Geen Data @endif</h1>
                        </div>
                        <div>
                            <h1 class=" font-bold text-gray-400 mb-2"><i class="fa-solid fa-signs-post mr-3 text-[#D4F200]"></i>Postcode</h1>
                            <h1 class="">@if($agendaSelectedItem && ! empty($agendaSelectedItem->toArray()) && $agendaSelectedItem->appointments->count() != 0){{$agendaSelectedItem->appointments[0]->client['postcode']}}   
                                @elseif($selectedAgenda && ! empty($selectedAgenda->toArray()) && $selectedAgenda->appointments->count() != 0) {{$selectedAgenda->appointments[0]->client['postcode']}}  @else Geen Data @endif</h1>                    
                        </div>
                        <div>
                            <h1 class=" font-bold text-gray-400 mb-2"><i class="fa-solid fa-tag mr-3 text-[#F28A9C]"></i>Naam</h1>
                            <h1 class="">@if($agendaSelectedItem && ! empty($agendaSelectedItem->toArray()) && $agendaSelectedItem->appointments->count() != 0){{$agendaSelectedItem->appointments[0]->client['firstname']}} {{$agendaSelectedItem->appointments[0]->client['infix']}} {{$agendaSelectedItem->appointments[0]->client['lastname']}} 
                                @elseif($selectedAgenda && ! empty($selectedAgenda->toArray()) && $selectedAgenda->appointments->count() != 0) {{$selectedAgenda->appointments[0]->client['firstname']}} {{$selectedAgenda->appointments[0]->client['infix']}} {{$selectedAgenda->appointments[0]->client['lastname']}}  @else Geen Data @endif</h1>                    
                        </div>
                        <div>
                            <h1 class=" font-bold text-gray-400 mb-2"><i class="fa-solid fa-at mr-3 text-[#F1AC4D]"></i>Email</h1>
                            <h1 class="">@if($agendaSelectedItem && ! empty($agendaSelectedItem->toArray()) && $agendaSelectedItem->appointments->count() != 0){{$agendaSelectedItem->appointments[0]->client['email']}} 
                                @elseif($selectedAgenda && ! empty($selectedAgenda->toArray()) && $selectedAgenda->appointments->count() != 0) {{$selectedAgenda->appointments[0]->client['email']}} @else Geen Data @endif</h1>                                        
                        </div>
                        <div>
                            <h1 class=" font-bold text-gray-400 mb-2"><i class="fa-solid fa-phone mr-3 text-[#F2F288]"></i>Telefoon</h1>
                            <h1 class="">@if($agendaSelectedItem && ! empty($agendaSelectedItem->toArray()) && $agendaSelectedItem->appointments->count() != 0){{$agendaSelectedItem->appointments[0]->client['phonenumber']}} 
                                @elseif($selectedAgenda && ! empty($selectedAgenda->toArray()) && $selectedAgenda->appointments->count() != 0) {{$selectedAgenda->appointments[0]->client['phonenumber']}} @else Geen Data @endif</h1>                                     
                        </div>
                        <div>
                            <h1 class=" font-bold text-gray-400 mb-2"><i class="fa-solid fa-scissors mr-3 text-[#D59FA0]"></i>Behandeling</h1>
                            <h1 class="">@if($agendaSelectedItem && ! empty($agendaSelectedItem->toArray()) && $agendaSelectedItem->appointments->count() != 0){{$agendaSelectedItem->appointments[0]->treatment['name']}} 
                                @elseif($selectedAgenda && ! empty($selectedAgenda->toArray()) && $selectedAgenda->appointments->count() != 0) {{$selectedAgenda->appointments[0]->treatment['name']}} @else Geen Data @endif</h1>                                      
                        </div>
                        <div>
                            <h1 class=" font-bold text-gray-400 mb-2"><i class="fa-solid fa-money-bill mr-3 text-[#F2D8D6]"></i>Prijs</h1>
                            <h1 class="">
                                @if($agendaSelectedItem && ! empty($agendaSelectedItem->toArray()) && $agendaSelectedItem->appointments->count() != 0)

                                    @php
                                        $price = 0;
                                    @endphp

                                    @foreach ($agendaSelectedItem->appointments as $appointment )
                                        
                                        @php
                                            $price = $price += $appointment->treatment['price'];
                                        @endphp

                                    @endforeach
                                    
                                    € {{$price}} 
                                
                                @elseif($selectedAgenda && ! empty($selectedAgenda->toArray()) && $selectedAgenda->appointments->count() != 0) 
                                
                                    @php
                                        $price = 0;
                                    @endphp


                                    @foreach ($selectedAgenda->appointments as $appointment )


                                        @php
                                            $price = $price += $appointment->treatment['price'];
                                        @endphp

                                    @endforeach
                                    
                                    € {{$price}} 
                                
                                @else 
                                
                                    Geen Data 
                                
                                @endif</h1>                                      
                        </div>
                        <div>
                            <h1 class=" font-bold text-gray-400 mb-2"><i class="fa-solid fa-road mr-3 text-[#d2ecea]"></i>Afstand (1x trip)</h1>
                            <h1 class="">@if($travel_distance_value){{$travel_distance_value}} ({{$travel_distance_text}})
                                 @else Geen Data @endif</h1>                                      
                        </div>
                    </div>
            
                    <div class="mb-20">
                        <h1 class=" font-bold text-gray-400 mb-2 mt-10"><i class="fa-solid fa-align-center mr-3 text-[#D59FA0]"></i>Notities</h1>
                        <h1 class="lg:h-[11rem] lg:overflow-y-auto lg:custom-scrollbar">@if($agendaSelectedItem && ! empty($agendaSelectedItem->toArray()) && $agendaSelectedItem->appointments->count() != 0){{$agendaSelectedItem['notes']}} 
                            @elseif($selectedAgenda && ! empty($selectedAgenda->toArray()) && $selectedAgenda->appointments->count() != 0) {{$selectedAgenda['notes']}} @else Geen Data @endif
                        </h1>            
                    </div>

                    
                </div>
                <div class="absolute bottom-0 right-0 grid grid-cols-2 gap-x-5 pb-10 pr-10">
                    @if($agendaSelectedItem && ! empty($agendaSelectedItem->toArray()) && $agendaSelectedItem->appointments->count() != 0)
                        <button onclick="confirm('Weet je zeker dat je dit agenda punt wilt afzeggen?')" type="button" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" wire:click="delete({{$agendaSelectedItem}})" data-dismiss="modal" ><i class="fa-solid fa-x mr-2"></i> Afzeggen</button>
                    @elseif($selectedAgenda && ! empty($selectedAgenda->toArray()) && $selectedAgenda->appointments->count() != 0) 
                        <button onclick="confirm('Weet je zeker dat je dit agenda punt wilt afzeggen?')" type="button" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" wire:click="delete({{$selectedAgenda}})" data-dismiss="modal" ><i class="fa-solid fa-x mr-2"></i> Afzeggen</button>
                    @else 
                    @endif
                    @if($agendaSelectedItem && ! empty($agendaSelectedItem->toArray()) && $agendaSelectedItem->appointments->count() != 0)
                        <button wire:click='$emit("openModal", "modals.afronden", @json(["agendaItem" => $agendaSelectedItem, "travel_distance_value" => $travel_distance_value]))' type="button" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"><i class="fa-solid fa-check mr-2"></i> Afronden</button>
                    @elseif($selectedAgenda && ! empty($selectedAgenda->toArray()) && $selectedAgenda->appointments->count() != 0) 
                        <button wire:click='$emit("openModal", "modals.afronden", @json(["agendaItem" => $selectedAgenda, "travel_distance_value" => $travel_distance_value]))' type="button" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"><i class="fa-solid fa-check mr-2"></i> Afronden</button>
                    @else 
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script type="text/javascript">

    function initMap() {
      const origin_LatLng = { lat: {{$origin_latitude}}, lng: {{$origin_longitude}} };
      const destination_LatLng = { lat: {{$destination_latitude}}, lng: {{$destination_longitude}} };

      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center: destination_LatLng,
      });

      new google.maps.Marker({
        position: destination_LatLng,
        map,
      });

    }

        window.initMap = initMap;



</script>

<script type="text/javascript"
    src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" ></script>

 --}}

    