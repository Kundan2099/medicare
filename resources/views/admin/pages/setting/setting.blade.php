@extends('admin.layouts.app')

@section('panel-header')
    <div>
        <ul class="breadcrumb">
            <li><a href="{{route('admin.view.dashboard')}}">Admin</a></li>
            <li><i data-feather="chevron-right"></i></li>
            <li><a href="{{route('admin.view.setting')}}">Settings</a></li>
        </ul>
        <h1 class="panel-title">Settings</h1>
    </div>
@endsection


@section('panel-body')
<div class="grid 2xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 lg:gap-7 sm:gap-5">

    <figure class="panel-card">
        <div class="panel-card-body">
            <div class="space-y-3">
                <div>
                    <div class="h-[50px] w-[50px] bg-complement rounded-full flex items-center justify-center text-ascent">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1.5em" width="1.5em" xmlns="http://www.w3.org/2000/svg"><path d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z"></path></svg>
                    </div>
                </div>
                <div>
                    <h1 class="title-lg">Account Settings</h1>
                    <p class="description">Manage your account information</p>
                </div>
                <div>
                    <a href="{{route('admin.view.setting.account')}}" class="link text-sm flex items-center space-x-2">
                        <span>Edit Information</span>    
                        <i data-feather="edit" class="h-3 w-3 stroke-[2.5px]"></i>
                    </a>
                </div>
            </div>
        </div>
    </figure>

    <figure class="panel-card">
        <div class="panel-card-body">
            <div class="space-y-3">
                <div>
                    <div class="h-[50px] w-[50px] bg-complement rounded-full flex items-center justify-center text-ascent">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1.5em" width="1.5em" xmlns="http://www.w3.org/2000/svg"><path d="M7 17a5.007 5.007 0 0 0 4.898-4H14v2h2v-2h2v3h2v-3h1v-2h-9.102A5.007 5.007 0 0 0 7 7c-2.757 0-5 2.243-5 5s2.243 5 5 5zm0-8c1.654 0 3 1.346 3 3s-1.346 3-3 3-3-1.346-3-3 1.346-3 3-3z"></path></svg>
                    </div>
                </div>
                <div>
                    <h1 class="title-lg">Update Password</h1>
                    <p class="description">Change your account password</p>
                </div>
                <div>
                    <a href="{{route('admin.view.setting.password')}}" class="link text-sm flex items-center space-x-2">
                        <span>Update Password</span>    
                        <i data-feather="edit" class="h-3 w-3 stroke-[2.5px]"></i>
                    </a>
                </div>
            </div>
        </div>
    </figure>

    @can(\App\Enums\Permission::MANAGE_ROLES_AND_PERMISSION->value)
    <figure class="panel-card">
        <div class="panel-card-body">
            <div class="space-y-3">
                <div>
                    <div class="h-[50px] w-[50px] bg-complement rounded-full flex items-center justify-center text-ascent">
                        <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="1.5em" width="1.5em" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                </div>
                <div>
                    <h1 class="title-lg">Roles & Permissions</h1>
                    <p class="description">Manage roles & permission settings</p>
                </div>
                <div>
                    <a href="{{route('admin.view.setting.role.permission')}}" class="link text-sm flex items-center space-x-2">
                        <span>Edit Prefrences</span>    
                        <i data-feather="edit" class="h-3 w-3 stroke-[2.5px]"></i>
                    </a>
                </div>
            </div>
        </div>
    </figure>
    @endcan

</div>
@endsection

@section('panel-script')
<script>
    document.getElementById('setting-tab').classList.add('active');
</script>
@endsection