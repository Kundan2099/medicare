@extends('admin.layouts.app')

@section('panel-header')
    <div>
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.view.dashboard') }}">Admin</a></li>
            <li><i data-feather="chevron-right"></i></li>
            <li><a href="{{ route('admin.view.admin.access.list') }}">Admin Access</a></li>
            <li><i data-feather="chevron-right"></i></li>
            <li><a href="{{ route('admin.view.admin.access.update', ['id' => $admin->id]) }}">Edit Admin Access</a></li>
        </ul>
        <h1 class="panel-title">Edit Admin Access</h1>
    </div>
@endsection

@section('panel-body')
    <form action="{{ route('admin.handle.admin.access.update', ['id' => $admin->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <figure class="panel-card">
            <div class="panel-card-header">
                <div>
                    <h1 class="panel-card-title">Edit Information</h1>
                    <p class="panel-card-description">Please fill the required fields</p>
                </div>
                @can(\App\Enums\Permission::DELETE_ACCESS->value)
                <div>
                    <button type="button" class="btn-danger-sm flex items-center justify-center" onclick="handleDelete()">
                        <span class="lg:block md:block sm:hidden mr-2">Delete</span>
                        <i data-feather="trash"></i>
                    </button>
                </div>
                @endcan
            </div>
            <div class="panel-card-body">
                <div class="grid 2xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-5">

                    {{-- Name --}}
                    <div class="input-group">
                        <label for="name" class="input-label">Name <em>*</em></label>
                        <input type="text" name="name" value="{{ old('name', $admin->name) }}"
                            class="input-box-md @error('name') input-invalid @enderror" placeholder="Enter Name" required>
                        @error('name')
                            <span class="input-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="flex flex-col">
                        <label for="email" class="input-label">Email Address <em>*</em></label>
                        <input type="email" name="email" value="{{ old('email', $admin->email) }}"
                            class="input-box-md @error('email') input-invalid @enderror" placeholder="Enter Email Address"
                            required minlength="1" maxlength="250">
                        @error('email')
                            <span class="input-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Phone --}}
                    <div class="flex flex-col">
                        <label for="phone" class="input-label">Phone <em>*</em></label>
                        <input type="tel" name="phone" value="{{ old('phone', $admin->phone) }}"
                            class="input-box-md @error('phone') input-invalid @enderror" placeholder="Enter Phone" required
                            pattern="[0-9]{10}" minlength="10" maxlength="10">
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
                                <option @selected(old('role_id',$admin->roles->first()->id) == $role->id) value="{{ $role->id }}">
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <span class="input-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="md:col-span-4 sm:col-span-1 grid md:grid-cols-4 sm:grid-cols-1 md:gap-7 sm:gap-5"
                        x-data="{ open: {{ old('password_change') == '1' ? 'true' : 'false' }} }">

                        {{-- Change Password --}}
                        <div class="md:col-span-4 sm:col-span-1">
                            <div class="flex items-center mt-2">
                                <input @click="open = ! open" @checked(old('password_change') == '1') value="1"
                                name="password_change" id="password_change" type="checkbox">
                                <label for="password_change" class="text-xs font-medium cursor-pointer select-none">Change Password</label>
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="input-group" x-show="open">
                            <label for="password" class="input-label">Password</label>
                            <input type="password" name="password"
                                class="input-box-md @error('password') input-invalid @enderror"
                                placeholder="Enter Password" minlength="6" maxlength="20">
                            @error('password')
                                <span class="input-error">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Confirm password --}}
                        <div class="input-group" x-show="open">
                            <label for="password_confirmation" class="input-label">Confirm password</label>
                            <input type="password" name="password_confirmation"
                                class="input-box-md @error('password_confirmation') input-invalid @enderror"
                                placeholder="Repeat Password" minlength="6" maxlength="20">
                            @error('password_confirmation')
                                <span class="input-error">{{ $message }}</span>
                            @enderror
                        </div>

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
        document.getElementById('admin-access-tab').classList.add('active');


        @can(\App\Enums\Permission::DELETE_ACCESS->value)
        const handleDelete = () => {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this admin access!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location =
                            "{{ route('admin.handle.admin.access.delete', ['id' => $admin->id]) }}";
                    }
                });
        }
        @endcan
    </script>
@endsection