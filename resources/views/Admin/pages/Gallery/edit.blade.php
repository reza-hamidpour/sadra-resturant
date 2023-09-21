@extends('Admin.layouts.main')
@section("content")
    @if(isset($notify))
        @include("Admin.layouts.notify")
    @endif
    <div class="page-header">
        <h3 class="page-title">
            Gallery
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Update Gallery</li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('foods-index') }}">View all</a></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update your Gallery</h4>
                    <p class="card-description"> Sadra Restaurant Galleries </p>
                    <form class="forms-sample" action="{{ route('gallery-update', $gallery->id) }}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="draft">Status</label>
                            <select class="form-control" name="draft" id="draft">
                                <option value="0" {{ $gallery->draft == 0 ? 'selected': '' }}>publish</option>
                                <option value="1" {{ $gallery->draft == 1 ? 'selected': '' }}>Draft</option>
                            </select>
                            @error('draft')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control"
                                   id="title" placeholder="Title" value="{{ $gallery->title }}">
                            @error('title')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="order">Order to show</label>
                            <input type="number" class="form-control" name="order" id="order"
                                   value="{{ $gallery->order }}">
                            @error('order')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-check form-group row form-check-primary">
                            <label for="index_show" class="form-check-label">
                                <input type="checkbox" name="index_show"
                                       class="form-check-input"
                                       id="index_show" {{ $gallery->index_show == true ? 'checked' : '' }}/>
                                Show in Index ? </label>
                            @error('index_show')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div id="wrapper-img-gallery">
                            <div class="input-group">
                                <button id="add-new-img" class="btn btn-success mb-3">Add New Pic</button>
                            </div>
                            <div id="img-gallery-0" class="form-group img-gallery" data-img="temp-img" style="display:none;">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <i class="cursor-pointer fa fa-trash fa-trash-hover mr-2 mt-auto mb-auto hover:text-red-950 " data-remove="img-gallery-0"></i>
                                         <a id="img-0"
                                            data-groupname="gallery-btn" data-input="img-0"
                                            data-preview="img-preview-0" class="lfm btn btn-primary btn-upload-pic">
                                             <i class="fa fa-picture-o"></i> Choose
                                         </a>
                                    </span>
                                    <input id="img-0" class="form-control input-gallery-imgs" type="text" name="gallery_imgs[0]">
                                </div>
                                <div id="img-preview-0"
                                     class="gallery-imgs-previewer"
                                     data-groupname='gallery-preview'
                                     style="margin-top:15px;max-height:100px;">
                                </div>
                            </div>
                           @forelse( $gallery->gallery_types()->get() as $img )
                                <div id="img-gallery-{{ $loop->index + 1 }}" class="form-group img-gallery" >
                                    <div class="input-group">
                                        <i class="fa fa-trash fa-trash-hover mr-2 mt-auto mb-auto" data-remove="img-gallery-{{ $loop->index + 1 }}"></i>
                                        <span class="input-group-btn">
                                             <a id="img-{{ $loop->index + 1 }}"
                                                data-groupname="gallery-btn" data-input="img-input-{{ $loop->index + 1 }}"
                                                data-preview="img-preview-{{ $loop->index + 1 }}" class="lfm btn btn-primary btn-upload-pic">
                                                 <i class="fa fa-picture-o"></i> Choose
                                             </a>
                                        </span>
                                        <input id="img-input-{{ $loop->index + 1 }}" class="form-control input-gallery-imgs"
                                               type="text" name="gallery_imgs[{{ $loop->index + 1 }}]"
                                                value="{{ $img->pic_url }}">
                                    </div>
                                    <div id="img-preview-{{ $loop->index + 1 }}"
                                         class="gallery-imgs-previewer"
                                         data-groupname='gallery-preview'
                                         style="margin-top:15px;max-height:100px;">
                                        <img src="{{ $img->pic_url }}" alt="{{ $gallery->title }}-{{ $img->id }}" style="height:100px; width:100px;">
                                    </div>
                                </div>
                            @empty
                                    <div id="img-gallery-1" class="form-group img-gallery" >
                                        <div class="input-group">
                                    <span class="input-group-btn">
                                         <a id="img-1"
                                            data-groupname="gallery-btn" data-input="img-1"
                                            data-preview="img-preview-1" class="lfm btn btn-primary btn-upload-pic">
                                             <i class="fa fa-picture-o"></i> Choose
                                         </a>
                                    </span>
                                            <input id="img-1" class="form-control input-gallery-imgs" type="text" name="gallery_imgs[1]">
                                        </div>
                                        <div id="img-preview-1"
                                             class="gallery-imgs-previewer"
                                             data-groupname='gallery-preview'
                                             style="margin-top:15px;max-height:100px;">
                                        </div>
                                    </div>
                           @endforelse
                        </div>
                        <script type="text/javascript">
                            $('a[data-groupname=gallery-btn][data-preview]').filemanager('image');
                        </script>
                        <input type="submit" class="btn btn-primary mr-2" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('Admin/assets/js/admin-gallery.js') }}"></script>
@endsection
