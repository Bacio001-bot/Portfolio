<div class="h-auto bg-white p-5 overflow-y-auto custom-scrollbar rounded-lg relative">
    
    <i wire:click='$emit("closeModal", "modals.agenda-aanmaken")' class="fa-solid fa-x text-xl text-gray-300 fixed right-5 cursor-pointer"></i>
    <h1 class="font-bold text-2xl text-[#240F97] ">Afspraak Aanmaken</h1>

    <div class="mt-10 relative">

        <div class="relative ">

            <label for="date" class="absolute top-[1.45rem] z-30 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">Datum</label>
            <input type="date" wire:model.lazy="date" id="date" class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600 w-[40rem] mt-8" required/>
        
        </div>

        <div class="relative ">

            <label for="time" class="absolute top-[1.45rem] z-30 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">Tijd</label>
            <input type="time" wire:model.lazy="time" id="time" class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600 w-[40rem] mt-8" required />
        
        </div>

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

        <div class="relative">
            <label for="notes" class="absolute top-[1.45rem] z-30 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">Notities</label>
            <textarea wire:model="notes" id="notes" cols="30" rows="5" class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600 w-[40rem] mt-8"></textarea>
        </div> 
        <button  wire:click="createAgenda" type="button" class="inline-flex float-right mt-10 items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"  data-dismiss="modal" ><i class="fa-solid fa-plus mr-2"></i> Toevoegen</button>

    </div>

</div>

@section('scripts')
    <script>
        flatpickr('#time')
    </script>
@endsection
