@extends('admin.layouts.app')

@section('panel-header')
    <div>
        <ul class="breadcrumb">
            <li><a href="{{route('admin.view.dashboard')}}">Admin</a></li>
            <li><i data-feather="chevron-right"></i></li>
            <li><a href="{{route('admin.view.dashboard')}}">Dashboard</a></li>
        </ul>
        <h1 class="panel-title">Dashboard</h1>
    </div>
@endsection


@section('panel-body')
<div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-7">

        <div class="lg:col-span-3 md:col-span-2 sm:col-span-1 ">
            <figure class="panel-card bg-center"  style="background-image: linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1)),url('/admin/images/auth-bg.png')">
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
                            @endphp, {{auth()->user()->name}}</h1>
                        <p class="text-sm text-gray-200">Welcome to your {{config('app.name')}} Administrator Dashboard</p>
                    </div>
    
                </div>
            </figure>  
        </div>
    
        <figure class="panel-card">
            <div class="panel-card-body">
                <div class="flex items-center justify-between">
                    <div class="h-[70px] w-[70px] bg-complement rounded-full flex items-center justify-center">
                        <svg stroke="currentColor" class="stroke-ascent" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="2em" width="2em" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <div class="text-right space-y-1">
                        <p class="text-sm font-medium text-gray-400">Total Admin Access</p>
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