<div class="h-auto bg-white p-5 overflow-y-auto custom-scrollbar rounded-lg relative">
    <i wire:click='$emit("closeModal", "modals.appointment-create")' class="fa-solid fa-x text-xl text-gray-300 fixed right-5 cursor-pointer"></i>
    <h1 class="font-bold text-2xl text-[#240F97] ">Klant Toevoegen Aan Afspraak</h1>

    <div class="mt-10 relative">

        <div class="relative">
            <label for="client_id" class="absolute top-[1.45rem] z-30 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">Klant</label>
            <select wire:model="client_id" class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600 w-[40rem] mt-8">
                @foreach ($clients as $client )
                    <option value="{{$client->id}}">{{$client->firstname}} {{$client->infix}}{{$client->lastname}} </option>
                @endforeach
            </select>
        </div>   

        <div class="relative">
            <label for="treatment_id" class="absolute top-[1.45rem] z-30 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">Behandeling</label>
            <select wire:model="treatment_id" class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600 w-[40rem] mt-8">
                @foreach ($treatments as $treatment )
                    <option value="{{$treatment->id}}">{{$treatment->name}}</option>
                @endforeach
            </select>
        </div>   
        <button onclick="confirm('Weet je zeker dat je deze klant wilt toevoegen aan de afspraak?')" wire:click="createAppointment" type="button" class="inline-flex float-right mt-10 items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"  data-dismiss="modal" ><i class="fa-solid fa-plus mr-2"></i> Toevoegen</button>

    </div>

</div>
