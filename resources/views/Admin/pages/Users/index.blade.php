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
                    <h2 class="card-title">Sadra Users</h2>
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Create New</a>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Group</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td class="overflow-td">{{ $user->name }}</td>
                                <td class="overflow-td">{{ $user->email }}</td>
                                <td class="overflow-td">
                                    @forelse($user->roles()->get() as $role)
                                        <span class="badge badge-dark">
                                            @if($role->name == "Admin" || $role->name == "SuperAdmin")
                                                <i class="mdi mdi-star"></i>
                                            @endif
                                            {{ $role->name }}</span>
                                    @empty
                                        <span class="badge badge-dark">
                                            Subscriber</span>
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}">
                                        <i class="mdi mdi-table-edit"></i>
                                    </a>
                                    <a href="{{ route('users.destroy', $user->id) }}">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th colspan="8" class="text-center">You have not created any Menu Link yet!
                                    <a href="{{ route('users.create') }}">Create A New Menu Link</a></th>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
