<div class="bg-[#1F2E8B] h-full w-full hidden lg:block relative group" >
    <ul class="text-3xl">
        <li class="p-5 px-3 mb-5 flex flex-auto">
            <img src="{{asset('img/logo.png')}}" class="h-[4rem] w-[4rem] p-3 mx-auto rounded-full bg-[#1B1F80]" alt="">
        </li>
        <a href="{{route('dashboard')}}">
            <li class="p-5 px-7 text-center hover:bg-[#1C207F] cursor-pointer flex flex-auto ">
                <i class="fa-solid fa-home text-white text-3xl -ml-1"></i>
                <h1 class="group-hover:block hidden ml-4 text-lg text-white font-bold">Dashboard</h1>
            </li>
        </a>
        <a href="{{route('company.index')}}">
            <li class="p-5 px-7 text-center hover:bg-[#1C207F] cursor-pointer flex flex-auto ">
                <i class="fa-solid fa-building text-white text-3xl"></i>
                <h1 class="group-hover:block hidden ml-4 text-lg text-white font-bold">Companies</h1>
            </li>
        </a>
        <a href="{{route('employee.index')}}">
            <li class="p-5 px-7 text-center hover:bg-[#1C207F] cursor-pointer flex flex-auto ">
                <i class="fa-solid fa-user text-white text-3xl"></i>
                <h1 class="group-hover:block hidden ml-5 text-lg text-white font-bold">Employees</h1>
            </li>
        </a>
        <a href="{{route('logout')}}">
            <li class="p-5 px-7 text-center hover:bg-[#1C207F] cursor-pointer flex flex-auto ">
                <i class="fa-solid fa-arrow-right-from-bracket text-white text-3xl"></i>
                <h1 class="group-hover:block hidden ml-5 text-lg text-white font-bold">Logout</h1>
            </li>
        </a>
    </ul>
    
</div>

<div class=" fixed bottom-[1rem] right-[1rem] h-auto w-[20rem] z-20">

    @if(Session::get('success'))

        <div x-init="setTimeout(() => { closeComponent() }, 2000);" class="bg-green-100 mt-2 border-l-4 w-full flex flex-auto alert-success border-green-500 text-green-700 p-4" role="alert">
            <i class="fa-solid fa-circle-check my-auto text-3xl mr-2"></i>
            <div>
                <p class="font-bold">Success</p>
                <p>{{Session::get('success')}}</p>
            </div>
        </div>
        
    @endif 

    @if(Session::get('error'))
        
        <div x-init="setTimeout(() => { closeComponent2() }, 2000);" class="bg-red-100 mt-2 border-l-4 w-full flex flex-auto alert-error border-red-500 text-red-700 p-4" role="alert">
            <i class="fa-solid fa-circle-xmark my-auto text-3xl mr-2"></i>
            <div>
                <p class="font-bold">Error</p>
                <p>{{Session::get('error')}}</p>
            </div>
        </div>
    
    @endif 

</div>   


<script>
    function closeComponent() {
        $(".alert-success").fadeOut(1000, function() { $(this).remove(); });
       '{{Session::forget("success")}}';
    }

    function closeComponent2() {
        $(".alert-error").fadeOut(1000, function() { $(this).remove(); });
       '{{Session::forget("error")}}';
    }
</script>

