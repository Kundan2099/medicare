<!DOCTYPE html>
<html lang="en">

<head>

    {{-- Meta Tags --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('admin/images/logo.png') }}">

    {{-- Stylesheets --}}
    <link rel="stylesheet" href="{{asset('web/css/app.css')}}">

    {{-- Title --}}
    <title>{{config('app.name')}}</title>
    
</head>

<body>

    {{-- Main (Start) --}}
    <main style="background-image: url('{{asset('web/images/welcome-bg.svg')}}')" class="bg-cover bg-center bg-no-repeat">

        <section class="h-screen w-full flex justify-center items-center">
            
            <div class="space-y-5">
                <div class="space-y-4 text-center">
                    <h1 class="font-bold text-ascent lg:text-4xl sm:text-2xl mb-2 leading-relaxed">{{config('app.name')}}</h1>
                </div>
                <div class="text-center">
                    <p class="text-gray-700 text-sm font-medium">Select your account to continue</p>
                </div>
                <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-5 items-center mx-auto justify-center">

                    <div class="md:col-span-1 sm:col-span-2 text-center">
                        <a href="{{route('web.view.login')}}" class="login-role-button flex items-center justify-center">
                            <div>
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 640 512" height="3em" width="3em" xmlns="http://www.w3.org/2000/svg"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c1.8 0 3.5-.2 5.3-.5c-76.3-55.1-99.8-141-103.1-200.2c-16.1-4.8-33.1-7.3-50.7-7.3H178.3zm308.8-78.3l-120 48C358 277.4 352 286.2 352 296c0 63.3 25.9 168.8 134.8 214.2c5.9 2.5 12.6 2.5 18.5 0C614.1 464.8 640 359.3 640 296c0-9.8-6-18.6-15.1-22.3l-120-48c-5.7-2.3-12.1-2.3-17.8 0zM591.4 312c-3.9 50.7-27.2 116.7-95.4 149.7V273.8L591.4 312z"></path></svg>
                                <p class="text-sm font-medium">User Login</p>
                            </div>
                        </a>
                    </div>

                    <div class="md:col-span-1 sm:col-span-2 text-center">
                        <a href="{{route('admin.view.login')}}" class="login-role-button flex items-center justify-center">
                            <div>
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 640 512" height="3em" width="3em" xmlns="http://www.w3.org/2000/svg"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c1.8 0 3.5-.2 5.3-.5c-76.3-55.1-99.8-141-103.1-200.2c-16.1-4.8-33.1-7.3-50.7-7.3H178.3zm308.8-78.3l-120 48C358 277.4 352 286.2 352 296c0 63.3 25.9 168.8 134.8 214.2c5.9 2.5 12.6 2.5 18.5 0C614.1 464.8 640 359.3 640 296c0-9.8-6-18.6-15.1-22.3l-120-48c-5.7-2.3-12.1-2.3-17.8 0zM591.4 312c-3.9 50.7-27.2 116.7-95.4 149.7V273.8L591.4 312z"></path></svg>
                                <p class="text-sm font-medium">Administrator</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
                

            {{-- </div> --}}
        </section>

    </main>
    {{-- Main (End) --}}

</body>

</html>