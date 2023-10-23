@extends('Admin.layouts.main')
@section('content')
    @include('Admin.layouts.page_title')
    @if(isset($notify))
        @include('Admin.layouts.notify')
    @endif
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update your users</h4>
                    <p class="card-description"> Sadra Restaurant Users </p>
                    <form class="forms-sample" action="{{ route('users.update', ['user' => $user]) }}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="link_title">Name</label>
                            <input type="text" name="name" class="form-control" id="link_title" placeholder="Title" value="{{ $user->name }}">
                            @error('name')
                                <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">
                                User Email/username
                            </label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email " value="{{ $user->email }}" disabled>
                            @error('email')
                                <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="parent">User Roles</label>
                            <select name="roles[]" id="roles" class="form-control form-control-range" multiple>
                                <option value="0">--</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ in_array($role->id, $user->roles()->pluck('id')->toArray())? 'selected': '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('roles')
                                <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary mr-2" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
