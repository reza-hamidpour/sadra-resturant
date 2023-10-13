@extends("client-side.layouts.base")
@section('content')
    @include('client-side.layouts.pages-slider')

    <div class="menu-container">
        <div class="container">
            <div class="row">
                <div class="menu-category">
                    <ul>
                        @if(isset($categories))
                            @foreach($categories as $category)
                                <li><a href="category-{{ $category->id }}" data-toggle="category-{{ $category->id }}"
                                       class="{{ $loop->index == 0 ? 'active' : '' }}">{{ $category->type_title }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <!-- Button trigger modal -->
                <div class="menu-products">
                    @foreach($categories as $category)

                        <div class="row {{ $loop->index == 0? 'active': 'hidden' }}" id="category-{{ $category->id }}"
                             data-items="category-{{ $category->id }}">
                            @foreach($category->foods()->get() as $food)
                                <div class="col-lg-6 col-12">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#FoodOpttions-{{ $food->id }}" class="menu-products-item-href">
                                        <div class="menu-products-item">
                                        <div class="menu-products-item-img">
                                                <img src="{{ $food->getThumbnail() }}" alt="{{ $food->title }}">
                                        </div>
                                        <div class="menu-products-item-text">
                                            <div class="menu-products-item-text-title">
                                                <h2>{!! $food->title !!}</h2>
                                                <p>{{ $food->ingredient }}</p>
                                            </div>
                                            <div class="menu-products-item-price">
                                                <span>${{ $food->price }}</span>
                                                <button href="#" data-bs-toggle="modal"
                                                   data-bs-target="#FoodOpttions-{{ $food->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                         width="24" height="24">
                                                        <path
                                                            d="M15.3709 3.43994L18.5819 9.00194L22.0049 9.00212V11.0021L20.8379 11.0019L20.0813 20.0852C20.0381 20.6035 19.6048 21.0021 19.0847 21.0021H4.92502C4.40493 21.0021 3.97166 20.6035 3.92847 20.0852L3.17088 11.0019L2.00488 11.0021V9.00212L5.42688 9.00194L8.63886 3.43994L10.3709 4.43994L7.73688 9.00194H16.2719L13.6389 4.43994L15.3709 3.43994ZM18.8309 11.0019L5.17788 11.0021L5.84488 19.0021H18.1639L18.8309 11.0019ZM13.0049 13.0021V17.0021H11.0049V13.0021H13.0049ZM9.00488 13.0021V17.0021H7.00488V13.0021H9.00488ZM17.0049 13.0021V17.0021H15.0049V13.0021H17.0049Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                <!-- Modal Select Purchase options -->
                                <div class="modal fade" id="FoodOpttions-{{ $food->id }}" tabindex="-1"
                                     aria-labelledby="FoodOpttionsLabel" aria-hidden="true">
                                    <div
                                        class="modal-dialog modal-fullscreen-md-down modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="FoodOpttionsLabel">{!! $food->title !!}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="modal-details-products">
                                                    <img src="{{ $food->getThumbnail() }}" class="img-fluid" alt="{{ $food->title }}">
                                                        @foreach($food->food_options()->get() as $options)
                                                                <div class="modal-details-products-text">
                                                                    <p>{{ $options->option_title }}</p>
                                                                </div>
                                                                <div class="modal-details-products-selectopt">
                                                                    @foreach($options->options()->get() as $option)
                                                                        <button data-price="{{ $option->price }}">{{ $option->option_value }}</button>
                                                                    @endforeach
                                                                </div>
                                                        @endforeach
                                                    <div class="modal-details-products-form">
                                                        <span>Please specify any allergies, food instructions, etc.</span>
                                                        <textarea type="text" label="Please specify any allergies, food instructions, etc." placeholder="Allergies, Intolerances, Cooking Preferences, etc." maxlength="300" rows="3"></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <div class="btn-qty">
                                                    <span class="btn-qty-btn">
                                                        <button type="button" class="btn-number"  data-type="minus" data-field="quant[2]">
                                                          -
                                                        </button>
                                                    </span>
                                                    <input type="text" name="quant[2]" class="input-number" value="1" min="1" max="100">
                                                    <span class="btn-qty-btn">
                                                        <button type="button" class="btn-number" data-type="plus" data-field="quant[2]">
                                                            +
                                                        </button>
                                                    </span>
                                                </div>
                                                <button id="add-to-cart-btn" class="add-to-cart-btn">Add to Cart - ${{ $food->price }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal -->
                            @endforeach
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
