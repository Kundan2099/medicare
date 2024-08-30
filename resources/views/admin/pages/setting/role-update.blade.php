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
            <li><a href="{{ route('admin.view.setting.role.update', ['id' => $role->id]) }}">Edit Role</a></li>
        </ul>
        <h1 class="panel-title">Edit Role</h1>
    </div>
@endsection

@section('panel-body')
    <form action="{{ route('admin.handle.setting.role.update', ['id' => $role->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <figure class="panel-card">
            <div class="panel-card-header">
                <div>
                    <h1 class="panel-card-title">Edit Information</h1>
                    <p class="panel-card-description">Please fill the required fields</p>
                </div>
            </div>
            <div class="panel-card-body">
                <div class="grid 2xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-5">

                    {{-- Name --}}
                    <div class="input-group">
                        <label for="name" class="input-label">Name <em>*</em></label>
                        <input type="text" name="name" value="{{ old('name', $role->name) }}"
                            class="input-box-md @error('name') input-invalid @enderror" placeholder="Enter Name"
                            minlength="1" maxlength="250" required>
                        @error('name')
                            <span class="input-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Permissions --}}
                    <div class="space-y-2 2xl:col-span-5 md:col-span-4 sm:col-span-1">
                        <label for="name" class="input-label">Current Permissions</label>
                        <div class="flex flex-wrap gap-3">
                            @foreach ($role_permissions as $permission)
                                @foreach ($permissions_enums::cases() as $enum)
                                    @if ($enum->value == $permission->name)
                                        <div
                                            class="text-xs px-3 py-1.5 font-medium rounded-md bg-ascent bg-opacity-10 flex items-center justify-center space-x-1">
                                            <span>{{ $enum->label() }}</span>
                                            <a class="h-3.5 w-3.5 flex items-center justify-center bg-red-500 text-white rounded-full"
                                                href="javascript:handleRemovePermission('{{ $permission->id }}');">&times;</a>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    </div>

                    <div class="space-y-2 2xl:col-span-5 md:col-span-4 sm:col-span-1">
                        <hr>
                    </div>

                    {{-- Permissions --}}
                    <div class="space-y-2 2xl:col-span-5 md:col-span-4 sm:col-span-1">
                        @foreach ($permissions as $permission)
                            <div class="input-radio">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                    id="permission_{{ $permission->name }}">
                                <label for="permission_{{ $permission->name }}">
                                    @foreach ($permissions_enums::cases() as $enum)
                                        @if ($enum->value == $permission->name)
                                            {{ $enum->label() }}
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
                <button type="submit" class="btn-primary-md md:w-fit sm:w-full">Save Changes</button>
            </div>
        </figure>
    </form>
@endsection

@section('panel-script')
    <script>
        document.getElementById('setting-tab').classList.add('active');

        const handleRemovePermission = (permission_id) => {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this permission!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location =
                            `{{ url('admin/setting/role/remove/permission/' . $role->id . '/${permission_id}') }}`;
                    }
                });
        }
    </script>
@endsection
