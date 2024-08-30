@extends('admin.layouts.app')

@section('panel-header')
    <div>
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.view.dashboard') }}">Admin</a></li>
            <li><i data-feather="chevron-right"></i></li>
            <li><a href="{{ route('admin.view.setting') }}">Settings</a></li>
            <li><i data-feather="chevron-right"></i></li>
            <li><a href="{{ route('admin.view.setting.password') }}">Update Password</a></li>
        </ul>
        <h1 class="panel-title">Update Password</h1>
    </div>
@endsection

@section('panel-body')
    <form action="{{route('admin.handle.setting.password')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <figure class="panel-card">
            <div class="panel-card-header">
                <div>
                    <h1 class="panel-card-title">Update Password</h1>
                    <p class="panel-card-description">Change your account password</p>
                </div>
            </div>
            <div class="panel-card-body">
                <div class="grid 2xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-5">

                    {{-- Current Password --}}
                    <div class="input-group">
                        <label for="current_password" class="input-label">Current Password <em>*</em></label>
                        <input type="password" name="current_password"
                            class="input-box-md @error('current_password') input-invalid @enderror"
                            placeholder="Current password" required>
                        @error('current_password')
                            <span class="input-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- New Password --}}
                    <div class="input-group">
                        <label for="password" class="input-label">New Password <em>*</em></label>
                        <input type="password" name="password"
                            class="input-box-md @error('password') input-invalid @enderror"
                            placeholder="New password" required min="6" maxlength="20">
                        @error('password')
                            <span class="input-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div class="input-group">
                        <label for="password" class="input-label">Confirm Password <em>*</em></label>
                        <input type="password" name="password_confirmation"
                            class="input-box-md @error('password_confirmation') input-invalid @enderror"
                            placeholder="Confirm password" required min="6" maxlength="20">
                        @error('password_confirmation')
                            <span class="input-error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="panel-card-footer">
                <button type="submit" class="btn-primary-md md:w-fit sm:w-full">Change Password</button>
            </div>
        </figure>
    </form>
@endsection

@section('panel-script')
    <script>
        document.getElementById('setting-tab').classList.add('active');
    </script>
@endsection
