@extends('admin.layouts.app')

@section('panel-header')
    <div>
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.view.dashboard') }}">Admin</a></li>
            <li><i data-feather="chevron-right"></i></li>
            <li><a href="{{ route('admin.view.admin.access.list') }}">Admin Access</a></li>
            <li><i data-feather="chevron-right"></i></li>
            <li><a href="{{ route('admin.view.admin.access.create') }}">Add Admin Access</a></li>
        </ul>
        <h1 class="panel-title">Add Admin Access</h1>
    </div>
@endsection

@section('panel-body')
    <form action="{{ route('admin.handle.admin.access.create') }}" method="POST" enctype="multipart/form-data">
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

                    {{-- Email --}}
                    <div class="flex flex-col">
                        <label for="email" class="input-label">Email Address <em>*</em></label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="input-box-md @error('email') input-invalid @enderror" placeholder="Enter Email Address"
                            required minlength="1" maxlength="250">
                        @error('email')
                            <span class="input-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Phone --}}
                    <div class="flex flex-col">
                        <label for="phone" class="input-label">Phone <em>*</em></label>
                        <input type="tel" pattern="[0-9]{10}" name="phone" value="{{ old('phone') }}"
                            class="input-box-md @error('phone') input-invalid @enderror"
                            placeholder="Enter Phone (10 Digits)" required minlength="10" maxlength="10">
                        @error('phone')
                            <span class="input-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Role --}}
                    <div class="flex flex-col">
                        <label for="role_id" class="input-label">Role <em>*</em></label>
                        <select name="role_id" class="input-box-md @error('role_id') input-invalid @enderror" required>
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                                <option @selected(old('role_id') == $role->id) value="{{ $role->id }}">
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <span class="input-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="input-group">
                        <label for="password" class="input-label">Password <em>*</em></label>
                        <input type="password" name="password"
                            class="input-box-md @error('password') input-invalid @enderror" placeholder="Enter Password"
                            required minlength="6" maxlength="20">
                        @error('password')
                            <span class="input-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Confirm password --}}
                    <div class="input-group">
                        <label for="password_confirmation" class="input-label">Confirm password <em>*</em></label>
                        <input type="password" name="password_confirmation"
                            class="input-box-md @error('password_confirmation') input-invalid @enderror"
                            placeholder="Repeat Password" required minlength="6" maxlength="20">
                        @error('password_confirmation')
                            <span class="input-error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="panel-card-footer">
                <button type="submit" class="btn-primary-md md:w-fit sm:w-full">Add Admin Access</button>
            </div>
        </figure>
    </form>
@endsection

@section('panel-script')
    <script>
        document.getElementById('admin-access-tab').classList.add('active');
    </script>
@endsection
