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
                    <h4 class="card-title">Create your Menu links</h4>
                    <p class="card-description"> Sadra Restaurant Links </p>
                    <form class="forms-sample" action="{{ route('links_store') }}" method="post">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="link_title">Link Title</label>
                            <input type="text" name="title" class="form-control" id="link_title" placeholder="Title" value="{{ old('title') }}">
                            @error('title')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="href">
                                Link
                            </label>
                            <input type="text" name="href" id="href" class="form-control" placeholder="Link" value="{{ old('href') }}">
                        </div>
                        <div class="form-group">
                            <label for="parent">Parent</label>
                            <select name="parent" id="parent" class="form-control">
                                <option value="0">--</option>
                                @foreach($links as $link)
                                    <option value="{{ $link->id }}">{{ $link->title }}</option>
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
