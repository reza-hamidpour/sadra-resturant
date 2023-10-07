@extends('client-side.layouts.base')
@section('content')
    @include('client-side.layouts.pages-slider')
    <div id="gallery-page">
        <div class="container">
            <div class="row">
                @if(isset($galleries))
                    @foreach( $galleries as $gallery )
                        <div id="gallery-page-item" class="col-lg-3 col-md-4 col-6">
                            <div class="text-start">
                                <div class="galleryTitle overflow-ellipsis max-w-md">
                                    <h3>{{ $gallery->title }}</h3>
                                </div>
                            </div>

                            <a class="link-light" href="{{ route('gallery-single', ['gallery' => $gallery->id ]) }}">
                                <img src="{{ $gallery->getFirstPic() }}" class="img-fluid"
                                     alt="{{ $gallery->id }}">
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
