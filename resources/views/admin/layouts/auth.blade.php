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
    <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}">

    {{-- Title --}}
    <title>Admin Panel </title>

</head>

<body>

    {{-- Main (Start) --}}
    <main class="h-screen w-full bg-admin-complement grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
        <section class="h-full flex items-center justify-center">
            <div class="lg:w-6/12 md:w-8/12 sm:w-10/12">
                @yield('auth-section')
            </div>
        </section>
        <section class="relative lg:block md:block sm:hidden">
            <div style="background-image: url('{{ asset('admin/images/auth-bg.png') }}')"
                class="bg-cover bg-center bg-no-repeat absolute h-screen w-full"></div>
            <div class="absolute h-full w-full flex items-center justify-center">
                <div class="lg:w-8/12 md:w-8/12 sm:w-10/12 text-center space-y-5">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-white mx-auto" height="5em"
                            viewBox="0 0 512 512">
                            <path
                                d="M256 0c4.6 0 9.2 1 13.4 2.9L457.7 82.8c22 9.3 38.4 31 38.3 57.2c-.5 99.2-41.3 280.7-213.6 363.2c-16.7 8-36.1 8-52.8 0C57.3 420.7 16.5 239.2 16 140c-.1-26.2 16.3-47.9 38.3-57.2L242.7 2.9C246.8 1 251.4 0 256 0zm0 66.8V444.8C394 378 431.1 230.1 432 141.4L256 66.8l0 0z" />
                        </svg>
                    </div>
                    <h1 class="font-semibold text-4xl text-white">Administrator Panel</h1>
                    <div class="flex items-center justify-center space-x-5">
                        <hr class="bg-white h-[2px] w-[70px] rounded-full">
                        <p class="font-medium text-lg text-white">{{config('app.name')}}</p>
                        <hr class="bg-white h-[2px] w-[70px] rounded-full">
                    </div>
                    <p class="leading-loose text-xs text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Aperiam beatae eligendi quis, minima tempore molestias.</p>
                    <div>
                        <a href="#" class="btn-light-sm flex items-center justify-center w-fit space-x-2 mx-auto">
                            <span>Visit Website</span>
                            <i data-feather="external-link"></i>
                        </a>
                    </div>

                </div>
            </div>
        </section>
    </main>
    {{-- Main (End) --}}

    {{-- Script --}}
    <script src="{{ asset('admin/js/app.js') }}"></script>

    @if (session('message'))
        <script defer>
            swal({
                icon: "{{ session('message')['status'] }}",
                title: "{{ session('message')['title'] }}",
                text: "{{ session('message')['description'] }}",
            });
        </script>
    @endif

</body>

</html>
