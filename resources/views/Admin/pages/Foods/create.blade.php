@extends('Admin.layouts.main')
@section("content")
    @if(isset($notify))
        @include("Admin.layouts.notify")
    @endif
    <div class="page-header">
        <h3 class="page-title">
            Foods
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Foods</li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('foods-index') }}">View all</a></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create your Food</h4>
                    <p class="card-description"> Sadra Restaurant Foods </p>
                    <form class="forms-sample" action="{{ route('food-store') }}" method="post">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="draft">Status</label>
                            <select class="form-control" name="draft" id="draft">
                                <option value="0">publish</option>
                                <option value="1">Draft</option>
                            </select>
                            @error('draft')
                                <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                            @error('title')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price" id="price" placeholder="15.65 CAD">
                            @error('price')
                                <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="food_types">Category</label>
                            <select name="food_types" id="food_types" class="dropdown" multiple>
                                @foreach($food_types as $type)
                                    <option value="{{ $type->id }}">{{ $type->type_title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-check form-group row form-check-primary">
                            <label for="need_age_check" class="form-check-label">
                            <input type="checkbox" name="need_age_check" class="form-check-input" id="need_age_check"/>
                                Age Limitation</label>
                            @error('need_age_check')
                                <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Food Picture">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                                @error('pic_url')
                                    <small class="text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary mr-2" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
