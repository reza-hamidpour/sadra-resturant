<div id="Gallery">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="GalleryTitle">
                    <div class="text-start">
                        <h4>GALLERY</h4>
                        <p>The list of the latest pictures of Sadra restaurant</p>
                    </div>
                    <div class="text-end">
                        <a href="#">see full gallery</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme owl-gallery">
                    @if(isset($gallery))
                        @forelse($gallery->gallery_types()->get() as $item)
                            <div class="item">
                                <img src="{{ $item->pic_url }}"
                                     class="img-fluid" title="{{ $gallery->title }}" alt="{{ $gallery->title }}">
                            </div>
                        @empty

                        @endforelse
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
