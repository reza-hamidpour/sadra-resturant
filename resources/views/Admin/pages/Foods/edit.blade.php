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
                @if(isset($food))
                <div class="card-body">
                    <h4 class="card-title">Create your Food</h4>
                    <p class="card-description"> Sadra Restaurant Foods </p>
                    <form class="forms-sample" action="{{ route('food-update', $food->id) }}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="draft">Status</label>
                            <select class="form-control" name="draft" id="draft">

                                <option value="0" {{ $food->draft ? 'selected': '' }}>publish</option>
                                <option value="1" {{ !$food->draft ? 'selected': '' }}>Draft</option>
                            </select>
                            @error('draft')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ $food->title }}">
                            @error('title')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="15.65 CAD" value="{{ $food->price }}">
                            @error('price')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ingredient">Ingredient</label>
                            <input type="text" class="form-control" id="ingredient" name="ingredient" placeholder="" value="{{ $food->ingredient }}">
                            @error('ingredient')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="food_types">Category</label>
                            <select name="food_types[]" id="food_types" class="dropdown" multiple>
                                @foreach($food_types as $type)
                                    <option value="{{ $type->id }}" {{ in_array($type->id, $food_types_ids) ? 'selected': '' }}>{{ $type->type_title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-check form-group row form-check-primary">
                            <label for="need_age_check" class="form-check-label">
                                <input type="checkbox" name="need_age_check"
                                       class="form-check-input" id="need_age_check"
                                        {{ $food->need_age_check == true ? 'checked' : '' }}/>
                                Age Limitation</label>
                            @error('need_age_check')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="pic_url" value="{{ $food->pic_url ?? "TEST" }}">
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;">
                                @error('pic_url')
                                <small class="text text-danger">{{ $message }}</small>
                                @enderror
                        </div>
                        <input type="submit" class="btn btn-primary mr-2" value="Submit"/>
                    </form>
                </div>
                @else
                <div class="card-body">

                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
