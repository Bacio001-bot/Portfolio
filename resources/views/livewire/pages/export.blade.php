<div class="lg:flex lg:flex-auto lg:h-[100vh] overflow-hidden grid lg:grid-cols-3 lg:pl-20">
    
    @include('components.flash-session')
    
    <div class=" lg:min-h-screen lg:pb-0 pb-10  bg-[#F7F7FF] w-full ">
        <div class="w-full lg:p-20 p-10  pb-0 ">
            <h1 class="text-[#240F97] font-bold text-2xl">Agenda Export</h1>
            <img class="lg:my-[25%] my-[15%] h-[450px]" src="{{asset('img/undraw_booked_re_vtod.svg')}}" alt="">
            <button wire:click="exportAgenda()" type="button" class="inline-flex w-full mt-10 items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><i class="fa-solid fa-download mr-2"></i> Export</button>
        </div>
    </div>
    <div class=" lg:min-h-screen lg:pb-0 pb-10  w-full ">
        <div class="w-full lg:p-20 p-10  pb-0 ">
            <h1 class="text-[#240F97] font-bold text-2xl">Klanten Export</h1>
            <img class="lg:my-[25%] my-[15%] h-[450px]" src="{{asset('img/undraw_personal_file_re_5joy.svg')}}" alt="">
            <button wire:click="exportClient()" type="button" class="inline-flex w-full mt-10 items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><i class="fa-solid fa-download mr-2"></i> Export</button>

        </div>
    </div>
    <div class=" lg:min-h-screen lg:pb-0 pb-10  bg-[#F7F7FF] w-full ">
        <div class="w-full lg:p-20 p-10  pb-0 ">
            <h1 class="text-[#240F97] font-bold text-2xl">Behandeling Export</h1>
            <img class="lg:my-[25%] my-[15%] h-[450px]" src="{{asset('img/undraw_barber_-3-uel.svg')}}" alt="">
            <button wire:click="exportTreatment()" type="button" class="inline-flex w-full mt-10 items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><i class="fa-solid fa-download mr-2"></i> Export</button>

        </div>
    </div>
</div>

