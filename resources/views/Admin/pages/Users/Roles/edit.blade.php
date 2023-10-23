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
                    <h4 class="card-title">Update your Role (User's Group)</h4>
                    <p class="card-description"> Sadra Restaurant Roles</p>
                    <form class="forms-sample" action="{{ route('roles.update', ['role'=>$role]) }}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="name">Role Title</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Role Title" value="{{ $role->name }}">
                            @error('name')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="permissions">Permissions</label>
                            <select name="permissions[]" id="permissions" class="form-control" multiple>
                                <option value="0">--</option>
                                @foreach($permissions as $permission)
                                    <option value="{{ $permission->id }}" {{ in_array($permission->id, $role->permissions()->pluck('id')->toArray())? 'selected': '' }}>{{ $permission->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary mr-2" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
