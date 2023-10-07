@extends('client-side.layouts.base')
@section('content')
    @include('client-side.layouts.pages-slider')
    <div id="gallery-page">
        <div class="container">
            <div class="row">
                @if(isset($gallery))
                    @foreach($gallery->gallery_types()->get() as $pic )
                        <div id="gallery-page-item" class="col-lg-3 col-md-4 col-6">
                            <img src="{{ $pic->pic_url }}" class="img-fluid" alt="{{ $gallery->title }}">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
