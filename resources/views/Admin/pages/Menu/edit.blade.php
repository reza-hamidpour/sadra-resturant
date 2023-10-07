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
                    <h4 class="card-title">Update your Menu Links</h4>
                    <p class="card-description"> Sadra Restaurant Foods </p>
                    <form class="forms-sample" action="{{ route('links_update', ['link' => $link]) }}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="link_title">Link Title</label>
                            <input type="text" name="title" class="form-control" id="link_title" placeholder="Title" value="{{ $link->title }}">
                            @error('title')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="href">
                                Link
                            </label>
                            <input type="text" name="href" id="href" class="form-control" placeholder="Link" value="{{ $link->href }}">
                            @error('href')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="parent">Parent</label>
                            <select name="parent" id="parent" class="form-control">
                                <option value="0">--</option>
                                @foreach($links as $parent_link)
                                    <option value="{{ $parent_link->id }}" {{ $link->parent == $parent_link->id? 'selected': '' }}>{{ $parent_link->title }}</option>
                                @endforeach
                            </select>
                            @error('parent')
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
