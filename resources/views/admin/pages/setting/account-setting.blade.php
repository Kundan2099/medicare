@extends('admin.layouts.app')

@section('panel-header')
    <div>
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.view.dashboard') }}">Admin</a></li>
            <li><i data-feather="chevron-right"></i></li>
            <li><a href="{{ route('admin.view.setting') }}">Settings</a></li>
            <li><i data-feather="chevron-right"></i></li>
            <li><a href="{{ route('admin.view.setting.account') }}">Account Information</a></li>
        </ul>
        <h1 class="panel-title">Account Information</h1>
    </div>
@endsection

@section('panel-body')
    <form action="{{route('admin.handle.setting.account')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <figure class="panel-card">
            <div class="panel-card-header">
                <div>
                    <h1 class="panel-card-title">Account Information</h1>
                    <p class="panel-card-description">Update your account information</p>
                </div>
            </div>
            <div class="panel-card-body">
                <div class="grid 2xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-5">

                    {{-- Profile --}}
                    <div class="2xl:col-span-5 xl:col-span-4 lg:col-span-4 md:col-span-4 sm:col-span-1">
                        <div class="flex items-center space-x-5">
                            <img src="{{ asset('storage/' . auth()->user()->profile_image) }}"
                                id="profile" alt="profile" class="h-24 w-24 rounded-full border bg-white" />
                            <div class="input-group">
                                <label for="profile_image" class="input-label">Profile</label>
                                <button type="button" onclick="document.getElementById('profile-input').click()" class="btn-primary-sm w-fit flex items-center space-x-1.5">
                                    <span>Select Image</span>
                                    <i data-feather="upload"></i>
                                </button>
                                <input hidden type="file" accept="image/jpeg, image/jpg, image/png" class="input-box-sm"
                                    name="profile_image" id="profile-input" onchange="handleProfilePreview(event)">
                                @error('profile_image')
                                    <span class="input-error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Name --}}
                    <div class="input-group">
                        <label for="name" class="input-label">Your Name <em>*</em></label>
                        <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                            class="input-box-md @error('name') input-invalid @enderror" placeholder="Enter name" required>
                        @error('name')
                            <span class="input-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="input-group">
                        <label for="email" class="input-label">Email Address <em>*</em></label>
                        <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                            class="input-box-md @error('email') input-invalid @enderror" placeholder="Enter email" required>
                        @error('email')
                            <span class="input-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Phone --}}
                    <div class="input-group">
                        <label for="phone" class="input-label">Phone <em>*</em></label>
                        <input type="tel" name="phone" value="{{ old('phone', auth()->user()->phone) }}"
                            class="input-box-md @error('phone') input-invalid @enderror" placeholder="Enter phone" required>
                        @error('phone')
                            <span class="input-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Date of Birth --}}
                    <div class="input-group">
                        <label for="date_of_birth" class="input-label">Date of Birth <span>(Optional)</span></label>
                        <input type="date" name="date_of_birth"
                            value="{{ old('date_of_birth', auth()->user()->date_of_birth) }}"
                            class="input-box-md @error('date_of_birth') input-invalid @enderror">
                        @error('date_of_birth')
                            <span class="input-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Gender --}}
                    <div class="input-group">
                        <label for="gender" class="input-label">Gender <span>(Optional)</span></label>
                        <select name="gender" id="gender" class="input-box-md @error('gender') input-invalid @enderror">
                            <option value="">Select Gender</option>
                            @foreach ($genders::cases() as $gender)
                            <option @selected(auth()->user()->gender == $gender->value) value="{{$gender->value}}">{{$gender->label()}}</option> 
                            @endforeach
                        </select>
                        @error('gender')
                            <span class="input-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Account Password --}}
                    <div class="input-group">
                        <label for="account_password" class="input-label">Account Password <em>*</em></label>
                        <input type="password" name="account_password"
                            class="input-box-md @error('account_password') input-invalid @enderror"
                            placeholder="Enter password" required>
                        @error('account_password')
                            <span class="input-error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="panel-card-footer">
                <button type="submit" class="btn-primary-md md:w-fit sm:w-full">Save Changes</button>
            </div>
        </figure>
    </form>
@endsection

@section('panel-script')
    <script>
        document.getElementById('setting-tab').classList.add('active');

        const handleProfilePreview = (event) => {
            console.log('casda');
            if (event.target.files.length == 0) {
                document.getElementById('profile').src =
                    "{{ asset('storage/' . auth()->user()->profile_image) }}";
            } else {
                document.getElementById('profile').src = URL.createObjectURL(event.target.files[0])
            }
        }

    </script>
@endsection
