<!DOCTYPE html>
<html lang="en">

<head>

    {{-- Meta Tags --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- <link rel="icon" type="image/x-icon" href="{{$logo}}"> --}}

    {{-- Stylesheets --}}
    <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}">

    {{-- Title --}}
    <title>Registration </title>

</head>

<body>

    {{-- Main (Start) --}}
    <main>
        <div class="container px-10 py-10 space-y-7">

            <div class="space-y-3">
                <h1 class="font-semibold text-ascent text-4xl">Account Registration</h1>
                <p class="text-xs text-gray-500">Register as an in {{ config('app.name') }}</p>
            </div>

            <form action="{{ route('web.handle.register') }}" method="POST">
                @csrf
                <figure class="panel-card">
                    <div class="panel-card-header">
                        <div>
                            <h1 class="panel-card-title">Registration</h1>
                            <p class="panel-card-description">Please fill the required fields</p>
                        </div>
                    </div>
                    <div class="panel-card-body">
                        <div class="grid 2xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-5">

                            {{-- Divider --}}
                            <div class="2xl:col-span-5 lg:col-span-4 md:col-span-2 sm:col-span-1">
                                <h1 class="title">General Information</h1>
                            </div>

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
                                    class="input-box-md @error('email') input-invalid @enderror"
                                    placeholder="Enter Email Address" required minlength="1" maxlength="250">
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

                            {{-- Date of Birth --}}
                            <div class="input-group">
                                <label for="date_of_birth" class="input-label">Date of Birth <em>*</em></label>
                                <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"
                                    class="input-box-md @error('date_of_birth') input-invalid @enderror" required>
                                @error('date_of_birth')
                                    <span class="input-error">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Gender --}}
                            <div class="input-group">
                                <label for="gender" class="input-label">Gender <em>*</em></label>
                                <select name="gender" id="gender"
                                    class="input-box-md @error('gender') input-invalid @enderror" required>
                                    <option value="">Select Gender</option>
                                    @foreach (\App\Enums\Gender::cases() as $gender)
                                        <option @selected(old('gender') == $gender->value) value="{{ $gender->value }}">
                                            {{ $gender->label() }}</option>
                                    @endforeach
                                </select>
                                @error('gender')
                                    <span class="input-error">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Divider --}}
                            <div class="2xl:col-span-5 lg:col-span-4 md:col-span-2 sm:col-span-1">
                                <h1 class="title mt-3">Address Information</h1>
                            </div>

                            {{-- Home --}}
                            <div class="input-group">
                                <label for="home" class="input-label">Home / Building
                                    <span>(Optional)</span></label>
                                <input type="text" name="home" value="{{ old('home') }}"
                                    class="input-box-md @error('home') input-invalid @enderror" placeholder="Enter Home"
                                    minlength="1" maxlength="250">
                                @error('home')
                                    <span class="input-error">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Street --}}
                            <div class="input-group">
                                <label for="street" class="input-label">Street <span>(Optional)</span></label>
                                <input type="text" name="street" value="{{ old('street') }}"
                                    class="input-box-md @error('street') input-invalid @enderror"
                                    placeholder="Enter Street" minlength="1" maxlength="250">
                                @error('street')
                                    <span class="input-error">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- City --}}
                            <div class="input-group">
                                <label for="city" class="input-label">City <em>*</em></label>
                                <input type="text" name="city" value="{{ old('city') }}"
                                    class="input-box-md @error('city') input-invalid @enderror"
                                    placeholder="Enter City" minlength="1" maxlength="50" required>
                                @error('city')
                                    <span class="input-error">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Postal Code --}}
                            <div class="input-group">
                                <label for="postal_code" class="input-label">Postal Code <em>*</em></label>
                                <input type="text" name="postal_code" value="{{ old('postal_code') }}"
                                    class="input-box-md @error('postal_code') input-invalid @enderror"
                                    placeholder="Enter Postal Code" minlength="6" maxlength="6" required>
                                @error('postal_code')
                                    <span class="input-error">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- State --}}
                            <div class="input-group">
                                <label for="state" class="input-label">State <em>*</em></label>
                                <input type="text" name="state" value="{{ old('state') }}"
                                    class="input-box-md @error('state') input-invalid @enderror"
                                    placeholder="Enter State" minlength="1" maxlength="50" required>
                                @error('state')
                                    <span class="input-error">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Country --}}
                            <div class="input-group">
                                <label for="country" class="input-label">Country <em>*</em></label>
                                <input type="text" name="country" value="{{ old('country') }}"
                                    class="input-box-md @error('country') input-invalid @enderror"
                                    placeholder="Enter Country" minlength="1" maxlength="50" required>
                                @error('country')
                                    <span class="input-error">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Divider --}}
                            {{-- <div class="2xl:col-span-5 lg:col-span-4 md:col-span-2 sm:col-span-1">
                                <h1 class="title mt-3">Aadhaar & PAN Information</h1>
                            </div> --}}

                            {{-- Aadhaar No. --}}
                            {{-- <div class="input-group">
                                <label for="aadhaar_card_no" class="input-label">Aadhaar No. <em>*</em></label>
                                <input type="text" name="aadhaar_card_no" value="{{ old('aadhaar_card_no') }}"
                                    class="input-box-md @error('aadhaar_card_no') input-invalid @enderror" placeholder="Enter Aadhaar No. (12 digits)" minlength="1" maxlength="250">
                                @error('aadhaar_card_no')
                                    <span class="input-error">{{ $message }}</span>
                                @enderror
                            </div> --}}

                            {{-- PAN No. --}}
                            {{-- <div class="input-group">
                                <label for="pan_card_no" class="input-label">PAN No. <em>*</em></label>
                                <input type="text" name="pan_card_no" value="{{ old('pan_card_no') }}"
                                    class="input-box-md @error('pan_card_no') input-invalid @enderror" placeholder="Enter PAN No. (10 digits)" minlength="1" maxlength="250">
                                @error('pan_card_no')
                                    <span class="input-error">{{ $message }}</span>
                                @enderror
                            </div> --}}

                            {{-- Divider --}}
                            <div class="2xl:col-span-5 lg:col-span-4 md:col-span-2 sm:col-span-1">
                                <h1 class="title mt-3">Set Password</h1>
                            </div>

                            {{-- Password --}}
                            <div class="input-group">
                                <label for="password" class="input-label">Password <em>*</em></label>
                                <input type="password" name="password"
                                    class="input-box-md @error('password') input-invalid @enderror"
                                    placeholder="Enter Password" required minlength="6" maxlength="20">
                                @error('password')
                                    <span class="input-error">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Confirm password --}}
                            <div class="input-group">
                                <label for="password_confirmation" class="input-label">Confirm password
                                    <em>*</em></label>
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
                        <button type="submit" class="btn-primary-md md:w-fit sm:w-full">Register</button>
                    </div>
                </figure>
            </form>


        </div>


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
