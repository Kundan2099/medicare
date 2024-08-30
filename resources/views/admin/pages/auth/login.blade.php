@extends('admin.layouts.auth')

@section('auth-section')
    <figure>
        <form action="{{ route('admin.handle.login') }}" method="POST" class="space-y-6">
            @csrf

            <div class="space-y-3">
                <h1 class="font-semibold text-ascent text-4xl">Sign In</h1>
                <p class="text-xs text-gray-500">Enter your email and password to sign in!</p>
            </div>

            <div class="input-group">
                <label for="email" class="input-label">Email Address <em>*</em></label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="input-box-md @error('email') input-invalid @enderror" placeholder="Enter Email Address" required
                    minlength="10" maxlength="100">
                @error('email')
                    <span class="input-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group">
                <label for="password" class="input-label">Password <em>*</em></label>
                <input type="password" name="password" class="input-box-md @error('password') input-invalid @enderror"
                    placeholder="Enter Password" required minlength="6" maxlength="20">
                @error('password')
                    <span class="input-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Remember me --}}
            <div class="flex items-center">
                <input type="checkbox" @checked(old('remember')) name="remember" id="remember">
                <label for="remember" class="text-xs">Keep me logged in</label>
            </div>

            <div>
                <button type="submit" class="btn-primary-md w-full flex items-center justify-center">
                    <span>Submit</span>
                    <i data-feather="arrow-right" class="absolute right-5"></i>
                </button>
            </div>

            <div>
                <p class="text-xs">Forgot your password ? <a href="{{route('admin.view.forgot.password')}}" class="link">Reset Password</a></p>
            </div>

        </form>
    </figure>
@endsection
