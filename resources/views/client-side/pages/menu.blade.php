@extends('client-side.layouts.base')
@section('content')
    @include('client-side.layouts.pages-slider')
    <!-- Modal Select Purchase options -->
    <div class="modal fade" id="FoodOpttions" tabindex="-1" aria-labelledby="FoodOpttionsLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-md-down modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="FoodOpttionsLabel">Soft Drinks</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-details-products">
                        <img src="dist/images/blog-1-700x456.jpg" class="img-fluid" alt="">
                        <div class="modal-details-products-text">
                            <p>Orange, Apple.,Cranberry.</p>
                        </div>
                        <div class="modal-details-products-selectopt">
                            <button>Sprite (lemon-lime)</button>
                            <button>Diet Coke.</button>
                            <button>Coca-Cola</button>
                            <button>Sprite (lemon-lime)</button>
                            <button>Diet Coke.</button>
                            <button>Coca-Cola</button>
                        </div>
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
                    <button id="add-to-cart-btn">Add to Cart - $19.99</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    <div class="menu-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="menu-category-mobile-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M19 22H5C3.34315 22 2 20.6569 2 19V3C2 2.44772 2.44772 2 3 2H17C17.5523 2 18 2.44772 18 3V15H22V19C22 20.6569 20.6569 22 19 22ZM18 17V19C18 19.5523 18.4477 20 19 20C19.5523 20 20 19.5523 20 19V17H18ZM16 20V4H4V19C4 19.5523 4.44772 20 5 20H16ZM6 7H14V9H6V7ZM6 11H14V13H6V11ZM6 15H11V17H6V15Z" fill="currentColor"></path></svg>
                        Menu Category
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-sm-8">
                    <div class="menu-category">
                        <ul>

                            @foreach($categories as $category)
                            <li class="{{ $loop->index == 0 ? 'active' : '' }}"><a href="category-{{ $category->id }}" data-toggle="category-{{ $category->id }}">{{ $category->type_title }}
                                    <span>
										<svg fill="currentColor" height="24" width="24" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                             viewBox="0 0 512 512" xml:space="preserve">
										<g>
											<g>
												<path d="M512,255.999c0-12.853-10.42-23.273-23.273-23.273h-92.053l79.393-102.076c7.891-10.145,6.063-24.767-4.082-32.658
													c-10.144-7.891-24.765-6.065-32.658,4.082L337.709,232.726H23.273C10.42,232.726,0,243.146,0,255.999
													c0,91.95,48.738,172.721,121.727,217.87c-3.348,4.031-5.364,9.208-5.364,14.859c0,12.853,10.42,23.273,23.273,23.273h232.727
													c12.853,0,23.273-10.42,23.273-23.273c0-5.651-2.015-10.828-5.365-14.859C463.262,428.719,512,347.949,512,255.999z M256,465.455
													c-107.627,0-196.555-81.602-208.17-186.183h301.227c0.006,0,0.012,0.002,0.019,0.002c0.005,0,0.009-0.002,0.014-0.002h115.082
													C452.554,383.851,363.627,465.455,256,465.455z"/>
											</g>
										</g>
										<g>
											<g>
												<path d="M163.846,99.905c-11.41-11.41-16.454-17.006-16.452-30.089c-0.002-13.079,5.042-18.676,16.458-30.09
													c9.089-9.087,9.087-23.822-0.002-32.911c-9.087-9.089-23.825-9.087-32.914,0c-12.699,12.701-30.093,30.093-30.088,63.001
													c-0.005,32.912,17.388,50.303,30.087,63.001c11.413,11.411,16.458,17.009,16.458,30.092c0,12.853,10.42,23.273,23.273,23.273
													c12.853,0,23.273-10.42,23.273-23.273C193.939,129.994,176.547,112.603,163.846,99.905z"/>
											</g>
										</g>
										<g>
											<g>
												<path d="M272.452,99.905c-11.41-11.41-16.454-17.005-16.452-30.087c-0.002-13.079,5.042-18.676,16.458-30.09
													c9.089-9.087,9.087-23.822-0.002-32.911c-9.087-9.089-23.825-9.087-32.914,0c-12.701,12.701-30.093,30.092-30.09,62.999
													c-0.005,32.912,17.388,50.303,30.087,63.001c11.414,11.411,16.46,17.009,16.46,30.092c0,12.853,10.42,23.273,23.273,23.273
													c12.853,0,23.273-10.42,23.273-23.273C302.546,129.994,285.153,112.603,272.452,99.905z"/>
											</g>
										</g>
										</svg>
									</span>
                                </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="menu-products">
                        @foreach($categories as $category)
                            <div id="category-{{ $category->id }}" class="row {{ $loop->index == 0? 'active'  : 'hidden' }}"
                                data-items="category-{{ $category->id }}"
                                style="{{ $loop->index == 0 ? '': 'display:none' }}">
                                @foreach($category->foods()->where('draft', '1')->get() as $food)
                                    <div class="col-xl-6 col-lg-12">
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
                                                    <span>{{ $food->price }}</span>
                                                    <button data-bs-toggle="modal" data-bs-target="#FoodOpttions-{{ $food->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M15.3709 3.43994L18.5819 9.00194L22.0049 9.00212V11.0021L20.8379 11.0019L20.0813 20.0852C20.0381 20.6035 19.6048 21.0021 19.0847 21.0021H4.92502C4.40493 21.0021 3.97166 20.6035 3.92847 20.0852L3.17088 11.0019L2.00488 11.0021V9.00212L5.42688 9.00194L8.63886 3.43994L10.3709 4.43994L7.73688 9.00194H16.2719L13.6389 4.43994L15.3709 3.43994ZM18.8309 11.0019L5.17788 11.0021L5.84488 19.0021H18.1639L18.8309 11.0019ZM13.0049 13.0021V17.0021H11.0049V13.0021H13.0049ZM9.00488 13.0021V17.0021H7.00488V13.0021H9.00488ZM17.0049 13.0021V17.0021H15.0049V13.0021H17.0049Z" fill="currentColor"></path></svg>
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
                                                                    <button data-price="{{ $option->price }}"
                                                                            data-optionid="{{ $options->id }}"
                                                                            data-optionvalue="{{ $option->option_value }}">
                                                                        {{ $option->option_value }}</button>
                                                                @endforeach
                                                                <input type="hidden" name="option-{{ $options->id }}" data-option="{{ $options->id }}"/>
                                                            </div>
                                                        @endforeach
                                                        @if($food->age_check)
                                                            <div class="modal-details-products-form">
                                                                <label for="age_check_{{ $food->id }}">
                                                                    Are you over the legal drinking age?
                                                                </label>
                                                                <input type="checkbox" id="age_check_{{ $food->id }}" data-checkbox="age_check">
                                                            </div>
                                                        @endif
                                                        <div class="modal-details-products-form">
                                                            <span>Please specify any allergies, food instructions, etc.</span>
                                                            <textarea type="text" id="{{ $food->id }}-textarea" label="Please specify any allergies, food instructions, etc." placeholder="Allergies, Intolerances, Cooking Preferences, etc." maxlength="300" rows="3"></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <div class="btn-qty">
                                                    <span class="btn-qty-btn">
                                                        <button type="button" data-target="{{ $food->id }}" class="btn-number"  data-type="minus" data-field="quant[{{ $food->id }}]">
                                                          -
                                                        </button>
                                                    </span>
                                                        <input type="text" name="quant[{{ $food->id }}]" data-target="{{ $food->id }}" class="input-number" value="1" min="1" max="100">
                                                        <span class="btn-qty-btn">
                                                        <button type="button" class="btn-number" data-target="{{ $food->id }}" data-type="plus" data-field="quant[{{ $food->id }}]">
                                                            +
                                                        </button>
                                                    </span>
                                                    </div>
                                                    <button id="add-to-cart-btn-{{ $food->id }}" class="add-to-cart-btn" data-price="{{ $food->price }}" data-foodid="{{ $food->id }}" >Add to Cart - $<span>{{ $food->price }}</span></button>
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
    </div>
    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
    <input type="hidden" name="add_to_cart" value="{{ route('cart-add-item') }}">
    <script type="text/javascript" src="{{ asset('client-side/dist/js/food-modal.js') }}"></script>
@endsection
