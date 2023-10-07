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
                    <h4 class="card-title">Create your Food</h4>
                    <p class="card-description"> Sadra Restaurant Foods </p>
                    <form class="forms-sample" action="{{ route('foods_type_create') }}" method="post">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="type_title">Category Name</label>
                            <input type="text" name="type_title" class="form-control" id="type_title" placeholder="Title" value="{{ old('type_title') }}">
                            @error('type_title')
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
