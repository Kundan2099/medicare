@extends('admin.layouts.auth')

@section('auth-section')
    <figure>
        <form action="{{ route('admin.handle.forgot.password') }}" method="POST" class="space-y-6">
            @csrf

            <div class="space-y-3">
                <h1 class="font-semibold text-ascent text-4xl">Forgot Password</h1>
                <p class="text-xs text-gray-500">Enter your email to get password reset link</p>
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

            <div>
                <button type="submit" class="btn-primary-md w-full flex items-center justify-center">
                    <span>Get Reset Link</span>
                    <i data-feather="link" class="absolute left-5"></i>
                </button>
            </div>

            <div>
                <p class="text-xs">Already have an account ? <a href="{{route('admin.view.login')}}" class="link">Login now</a></p>
            </div>

        </form>
    </figure>
@endsection
