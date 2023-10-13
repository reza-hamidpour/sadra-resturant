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
                            <label for="ingredient">Ingredient</label>
                            <input type="text" class="form-control" name="ingredient" id="ingredient" placeholder="" value="{{ old('ingredient') }}">
                            @error('ingredient')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="food_types">Category</label>
                            <select name="food_types[]" id="food_types" class="dropdown" multiple>
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
                            <div class="input-group">
                                    <span class="input-group-btn">
                                         <a id="lfm" data-input="pic_url" data-preview="holder" class="btn btn-primary">
                                             <i class="fa fa-picture-o"></i> Choose
                                         </a>
                                    </span>
                                <input id="pic_url" class="form-control" type="text" name="pic_url" value="{{ old('pic_url') }}">
                            </div>
                            <div id="holder" style="margin-top:15px;max-height:100px;">
                            </div>
                        </div>
                        @error('pic_url')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                        <script type="text/javascript">  $('#lfm').filemanager('image'); </script>

                        <div class="row" id="wrapper-options">
                            <button id="add_new_option" href="options" class="btn btn-primary mb-3">Add Option</button>
                            <div class="foods-options col-12 mb-5" data-option="temp-option" style="display:none;">
                                <div class="option_title mt-10">
                                    <label for="option_title_label" class="form-label">Enter your Option Title</label>
                                    <input type="text" data-option="option_title" id="option_title_0" class="form-control mb-3 col-10" name="option_title[0]" placeholder="Enter Option Title" data-groupname="option_0">
                                    <button id="add_option_options" class="btn btn-success col-0" href="option_options" data-groupname="option_0">
                                        <i class="fa fa-plus" data-optionname="temp-option"></i>
                                    </button>
                                </div>
                                <div class="option_options mt-2" data-optionparent="temp-option">
                                    <div class="row">
                                        <input type="text" name="option_value[0][]" class="form-control col-4" data-optionoption="option_0" data-optiontype="value" placeholder="Option Value">
                                        <input type="text" name="option_price[0][]" class="form-control col-3" data-optionoption="option_0" data-optiontype="price" placeholder="Option Price">
                                        <span class="col-1">
                                            <i class="fa fa-trash"></i>
                                        </span>
                                    </div>
                                    <div class="row mt-2">
                                        <input type="text" name="option_value_1[]" class="form-control col-4" data-optionoption="option_0" data-optiontype="value" placeholder="Option Value">
                                        <input type="text" name="option_price_1[]" class="form-control col-3" data-optionoption="option_0" data-optiontype="price" placeholder="Option Price">
                                        <span class="col-1 hover:bg-red-600">
                                            <i class="fa fa-trash"></i>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary mr-2" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('Admin/assets/js/admin-foods.js') }}"></script>
@endsection
