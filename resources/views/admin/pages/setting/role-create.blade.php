@extends('admin.layouts.app')

@section('panel-header')
    <div>
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.view.dashboard') }}">Admin</a></li>
            <li><i data-feather="chevron-right"></i></li>
            <li><a href="{{ route('admin.view.setting') }}">Settings</a></li>
            <li><i data-feather="chevron-right"></i></li>
            <li><a href="{{ route('admin.view.setting.role.permission') }}">Roles & Permissions</a></li>
            <li><i data-feather="chevron-right"></i></li>
            <li><a href="{{ route('admin.view.setting.role.create') }}">Add Role</a></li>
        </ul>
        <h1 class="panel-title">Add Role</h1>
    </div>
@endsection

@section('panel-body')
    <form action="{{route('admin.handle.setting.role.create')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <figure class="panel-card">
            <div class="panel-card-header">
                <div>
                    <h1 class="panel-card-title">Add Information</h1>
                    <p class="panel-card-description">Please fill the required fields</p>
                </div>
            </div>
            <div class="panel-card-body">
                <div class="grid 2xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-5">
                
                    {{-- Name --}}
                    <div class="input-group">
                        <label for="name" class="input-label">Name <em>*</em></label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="input-box-md @error('name') input-invalid @enderror" placeholder="Enter Name"
                            minlength="1" maxlength="250" required>
                        @error('name')
                            <span class="input-error">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    {{-- Permissions --}}
                    <div class="space-y-2 2xl:col-span-5 md:col-span-4 sm:col-span-1">
                        @foreach ($permissions as $permissions)
                        <div class="input-radio">
                            <input type="checkbox" name="permissions[]" value="{{$permissions->id}}" id="permission_{{$permissions->name}}">
                            <label for="permission_{{$permissions->name}}">
                                @foreach ($permissions_enums::cases() as $enum)
                                @if ($enum->value == $permissions->name)
                                {{$enum->label()}}
                                @endif
                                @endforeach
                            </label>
                        </div>        
                        @endforeach
                        @error('permissions')
                            <span class="input-error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="panel-card-footer">
                <button type="submit" class="btn-primary-md md:w-fit sm:w-full">Add Role</button>
            </div>
        </figure>
    </form>
@endsection

@section('panel-script')
    <script>
        document.getElementById('setting-tab').classList.add('active');
    </script>
@endsection
