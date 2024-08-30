@extends('admin.layouts.app')

@section('panel-header')
    <div>
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.view.dashboard') }}">Admin</a></li>
            <li><i data-feather="chevron-right"></i></li>
            <li><a href="{{ route('admin.view.setting') }}">Settings</a></li>
            <li><i data-feather="chevron-right"></i></li>
            <li><a href="{{ route('admin.view.setting.role.permission') }}">Roles & Permissions</a></li>
        </ul>
        <h1 class="panel-title">Roles & Permissions</h1>
    </div>
@endsection

@section('panel-body')
    {{-- <form action="{{route('admin.handle.setting.password')}}" method="POST" enctype="multipart/form-data">
        @csrf --}}
        <figure class="panel-card">
            <div class="panel-card-header">
                <div>
                    <h1 class="panel-card-title">Roles & Permissions</h1>
                    <p class="panel-card-description">List of all roles in the system</p>
                </div>
                <div>
                    <a href="{{ route('admin.view.setting.role.create') }}" class="btn-primary-sm flex">
                        <span class="lg:block md:block sm:hidden mr-2">Add Role</span>
                        <i data-feather="plus"></i>
                    </a>
                </div>
            </div>
            <div class="panel-card-body">
                <div class="panel-card-table">
                    <table class="data-table">
                        <thead>
                            <th>Sr. No.</th>
                            <th>Role Name</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <div class="table-dropdown">
                                            <button>Options<i data-feather="chevron-down" class="ml-1 toggler-icon"></i></button>
                                            <div class="dropdown-menu">
                                                <ul>
                                                    <li><a href="{{route('admin.view.setting.role.update',['id' => $role->id])}}" class="dropdown-link-primary"><i data-feather="edit" class="mr-1"></i> Edit Role</a></li>
                                                    <li><a href="javascript:handleDelete({{$role->id}});" class="dropdown-link-danger"><i data-feather="trash-2" class="mr-1"></i> Delete Role</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </figure>
    {{-- </form> --}}
@endsection

@section('panel-script')
    <script>
        document.getElementById('setting-tab').classList.add('active');
    </script>
@endsection
