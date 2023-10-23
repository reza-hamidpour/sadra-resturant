@extends('Admin.layouts.main')
@section('content')
    @include('Admin.layouts.page_title')
    @if(isset($notify))
        @include("Admin.layouts.notify")
    @endif
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body p-4">
                    <h2 class="card-title">Sadra Roles</h2>
                    <a href="{{ route('roles.create') }}" class="btn btn-primary">Create New</a>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Role Name</th>
                            <th>Permissions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td class="overflow-td">{{ $role->name }}</td>
                                <td class="overflow-td overflow-x-scroll" style="overflow-x:scroll;">
                                    <ul class="overflow-x-scroll">
                                        @foreach($role->permissions()->get() as $permission)
                                            <li class="badge badge-dark">
                                                {{ $permission->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{ route('roles.edit', $role->id) }}">
                                        <i class="mdi mdi-table-edit"></i>
                                    </a>
                                    <a href="{{ route('roles.destroy', $role->id) }}">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th colspan="8" class="text-center">You have not created any Role yet!
                                    <a href="{{ route('roles.create') }}">Create A New Role</a></th>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
