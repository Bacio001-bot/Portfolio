<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />



    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body class=" font-sans h-screen max-w-screen bg-cover bg-[url('https://www.sailsrestaurants.com/_cms3/wwwroot/adminPublicFiles/design/cms3admin-background-01.jpg')]">
    
    <div class="grid gap-y-5 absolute m-auto left-0 right-0 h-[334px] bottom-0 top-0 py-10 w-[25rem] shadow rounded-lg bg-white bg-opacity-80">
        <div class="grid place-items-center gap-y-5">
            
            <h1 class="text-2xl font-bold pb-6 italic text-gray-700">Login into your dashboard</h1>
            
            <a href="{{route('googlelogin')}}">
                <button class="bg-white p-3 hover:bg-slate-50 rounded shadow w-[15rem] text-gray-600 font-semibold border"><i class="fa-brands fa-google mr-2 text-[#319F4F] "></i> Login in with Google</button>
            </a>
            <a href="{{route('githublogin')}}">
                <button class="bg-white p-3 hover:bg-slate-50 rounded shadow w-[15rem] text-gray-600 font-semibold border"><i class="fa-brands fa-github mr-2 text-[#DE4032] "></i> Login in with Github</button>
            </a>
            <a href="{{route('discordlogin')}}">
                <button class="bg-white p-3 hover:bg-slate-50 rounded shadow w-[15rem] text-gray-600 font-semibold border"><i class="fa-brands fa-discord mr-2 text-[#3F7EE8] "></i> Login in with Discord</button>
            </a>

        </div>
    </div>

</body>

</html>
