<div id="Products">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="SectionTitle mb-0">
                    <h2>POPULAR ITEMS</h2>
                    <p>The list of the best dishes in Sadra Restaurant.</p>
                </div>
            </div>
        </div>
        <div class="row">

            @if(isset($popular_items))
                @foreach($popular_items as $product)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="ProductItem">
                            <div class="ProductItemBox">
                                <a href="#">
                                    <div class="ProductItemImage">
                                        <img
                                            src="{{ asset('client-side/dist/images/dressing-balsamic-black-pepper-grill-chicken-recipe.png') }}"
                                            class="img-fluid" title="" alt="">
                                    </div>
                                    <div class="ProductItemText">
                                        <h2>{{ $product->title }}</span></h2>
                                        <p>{{ $product->ingredient }}</p>
                                    </div>
                                </a>
                                <div class="ProductItemDetails">
                                    <div class="ProductItemPrice">{{ $product->price }}CAD</div>
                                    <div class="ProductItemRate">
                                        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                                   height="18"><path
                                                    d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"
                                                    fill="currentColor"></path></svg></span>
                                        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                                   height="18"><path
                                                    d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"
                                                    fill="currentColor"></path></svg></span>
                                        <span><svg class="active" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                   width="18" height="18"><path
                                                    d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"
                                                    fill="currentColor"></path></svg></span>
                                        <span><svg class="active" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                   width="18" height="18"><path
                                                    d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"
                                                    fill="currentColor"></path></svg></span>
                                        <span><svg class="active" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                   width="18" height="18"><path
                                                    d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"
                                                    fill="currentColor"></path></svg></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
