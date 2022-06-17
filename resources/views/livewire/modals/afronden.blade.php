<div class="h-auto bg-white p-5 overflow-y-auto custom-scrollbar rounded-lg relative">
    <i wire:click='$emit("closeModal", "modals.afronden")' class="fa-solid fa-x text-xl text-gray-300 fixed right-5 cursor-pointer"></i>
    <h1 class="font-bold text-2xl text-[#240F97] ">Afspraak Afronden</h1>

    <div class="mt-10 relative">

        <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600 w-[40rem] mt-8">
            <label for="price" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">Totaal Prijs</label>
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="text-gray-500 sm:text-sm">
                    €
                </span>
              </div>
            <input type="text" wire:model="price" class="pl-3 block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" >
        </div>

        <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600 w-[40rem] mt-8">
            <label for="travel_distance_value" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">Afstand (Meters)</label>
            <input type="text" wire:model="travel_distance_value" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" >
        </div>

        <div class="relative">
            <label for="payment_methode" class="absolute top-[1.45rem] z-30 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">Betaal Methode</label>
            <select wire:model="payment_methode" class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600 w-[40rem] mt-8">
                <option value="contant">Contant</option>
                <option value="contant">Digitaal</option>
            </select>
        </div>        



        <div class="h-[30vh] overflow-y-auto custom-scrollbar mt-10 overflow-x-hidden relative">
        <table class="min-w-full divide-y divide-gray-300 border">
            <thead class="bg-gray-100">
                <tr class="divide-x divide-gray-200">
                <th scope="col" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Naam</th>
                <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Behandeling</th>
                <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Prijs</th>
                <th scope="col" class="px-4 py-3.5  text-sm font-semibold text-gray-900 text-center" wire:click='$emit("openModal", "modals.appointment-create", @json(["agendaItem" => $agendaItem]))'><i class="fa-solid fa-plus"></i></th>

                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white border-b">
                @foreach ($agendaItem->appointments as $appointment)
                    <tr class="divide-x divide-gray-200 border-y" x-data="{ options: false }" >
                            <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">{{$appointment->client['firstname']}} {{$appointment->client['infix']}} {{$appointment->client['lastname']}}</td>
                            <td class="whitespace-nowrap p-4 text-sm text-gray-500">{{$appointment->treatment['name']}}</td>
                            <td class="whitespace-nowrap p-4 text-sm text-gray-500">€ {{$appointment->treatment['price']}}</td>
                            <td class="text-center whitespace-nowrap p-4 text-sm text-gray-500" @click=" options = ! options"><i class="fa-solid fa-ellipsis-vertical" ></i>
                                <ul class="h-auto absolute right-5 rounded bg-[#F7F7FF] border" x-show="options" @click.outside="options = false">
                                    @if($agendaItem->appointments->count() != 1)
                                        <li class="px-3 py-1.5 border-b hover:opacity-50 cursor-pointer" onclick="confirm('Weet je zeker dat je deze klant van dit agenda punt wilt afhalen?')" wire:click="deleteAppointment({{$appointment}})">Verwijderen</li>
                                    @endif
                                    <li class="px-3 py-1.5 hover:opacity-50 cursor-pointer">Aanpassen</li>
                                </ul>
                            </td>
                    </tr>
                @endforeach

            </tbody>
            </table>
        </div>

        <button onclick="confirm('Weet je zeker dat je dit item wilt afronden?')" wire:click="finishAgenda" type="button" class="inline-flex float-right mt-10 items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"  data-dismiss="modal" ><i class="fa-solid fa-check mr-2"></i> Afronden</button>

    </div>

</div>
