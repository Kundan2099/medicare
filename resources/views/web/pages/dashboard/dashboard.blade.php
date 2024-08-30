@extends('web.layouts.app')

@section('panel-header')
    <div>
        <ul class="breadcrumb">
            <li><a href="{{ route('web.view.dashboard') }}">User</a></li>
            <li><i data-feather="chevron-right"></i></li>
            <li><a href="{{ route('web.view.dashboard') }}">Dashboard</a></li>
        </ul>
        <h1 class="panel-title">Dashboard</h1>
    </div>
@endsection

@section('panel-body')
    <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-7">

        <div class="lg:col-span-3 md:col-span-2 sm:col-span-1 ">
            <figure class="panel-card bg-center"
                style="background-image: linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1)),url('/admin/images/auth-bg.png')">
                <div class="lg:p-10 md:p-10 sm:p-7 space-y-4">

                    <div class="space-y-2">
                        <h1 class="font-semibold text-3xl text-white">
                            @php
                                if (date('H:i') >= '06:00' && date('H:i') < '12:00') {
                                    echo 'Good morning';
                                } elseif (date('H:i') >= '12:00' && date('H:i') < '18:00') {
                                    echo 'Good afternoon';
                                } else {
                                    echo 'Good evening';
                                }
                            @endphp, {{ auth()->user()->name }}</h1>
                        <p class="text-sm text-gray-200">Welcome to your {{ config('app.name') }} User Dashboard</p>
                    </div>

                    <div class="space-y-2">

                        {{-- @if (is_null(auth('alumni')->user()->phone_verified_at))
                            <div class="flex items-center text-gray-200 text-sm space-x-1">
                                <i data-feather="alert-circle" class="h-4 w-4"></i>
                                <p>Your Phone number is not verified yet <a class="text-white font-semibold ml-1"
                                        href="{{ route('web.view.verification.phone') }}">Verify now</a></p>
                            </div>
                        @endif --}}

                        {{-- @if (is_null(auth()->user()->email_verified_at))
                            <div class="flex items-center text-gray-200 text-sm space-x-1">
                                <i data-feather="alert-circle" class="h-4 w-4"></i>
                                <p>Your Email Address number is not verified yet <a class="text-white font-semibold ml-1"
                                        href="{{ route('web.view.verification.email') }}">Verify now</a></p>
                            </div>
                        @endif --}}

                    </div>
                </div>
            </figure>
        </div>


        <figure class="panel-card">
            <div class="panel-card-body">
                <div class="flex items-center justify-between">
                    <div class="h-[70px] w-[70px] bg-complement rounded-full flex items-center justify-center">
                        <svg stroke="currentColor" class="stroke-ascent" fill="none" stroke-width="2" viewBox="0 0 24 24"
                            aria-hidden="true" height="2em" width="2em" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                    </div>
                    <div class="text-right space-y-1">
                        <p class="text-sm font-medium text-gray-400">Total {{ config('app.name') }} Members</p>
                        <h1 class="font-semibold text-ascent text-2xl">34</h1>
                    </div>
                </div>
            </div>
        </figure>

        <figure class="panel-card">
            <div class="panel-card-body">
                <div class="flex items-center justify-between">
                    <div class="h-[70px] w-[70px] bg-complement rounded-full flex items-center justify-center">
                        <svg stroke="currentColor" class="stroke-ascent" fill="none" stroke-width="2" viewBox="0 0 24 24"
                            aria-hidden="true" height="2em" width="2em" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="text-right space-y-1">
                        <p class="text-sm font-medium text-gray-400">Total Registred Users</p>
                        <h1 class="font-semibold text-ascent text-2xl"></h1>
                    </div>
                </div>
            </div>
        </figure>
    </div>
@endsection

@section('panel-script')
    <script>
        document.getElementById('dashboard-tab').classList.add('active');
    </script>
@endsection
