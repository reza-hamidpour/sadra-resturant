@extends('client-side.layouts.base')
@section('content')
    <script src="{{ asset('client-side/dist/js/pickmeup.js') }}"></script>
<div class="reservations">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ContactFormBox-Form reservations-box">
                    <div class="ContactFormBox-Form-Title">
                        <h4>reservations</h4>
                        <p>Let us know how  we can help</p>
                    </div>
                    <div class="ContactFormBox-Form-Area">
                        <div class="row">
                            <div class="FrmGp mb-3 col-lg-6">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H18C18 18.6863 15.3137 16 12 16C8.68629 16 6 18.6863 6 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11Z" fill="currentColor"></path></svg>
                                        </span>
                                <input type="text" name="name" placeholder="Your Name">
                                @error('name')
                                <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="FrmGp mb-3  col-lg-6">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21 16.42V19.9561C21 20.4811 20.5941 20.9167 20.0705 20.9537C19.6331 20.9846 19.2763 21 19 21C10.1634 21 3 13.8366 3 5C3 4.72371 3.01545 4.36687 3.04635 3.9295C3.08337 3.40588 3.51894 3 4.04386 3H7.5801C7.83678 3 8.05176 3.19442 8.07753 3.4498C8.10067 3.67907 8.12218 3.86314 8.14207 4.00202C8.34435 5.41472 8.75753 6.75936 9.3487 8.00303C9.44359 8.20265 9.38171 8.44159 9.20185 8.57006L7.04355 10.1118C8.35752 13.1811 10.8189 15.6425 13.8882 16.9565L15.4271 14.8019C15.5572 14.6199 15.799 14.5573 16.001 14.6532C17.2446 15.2439 18.5891 15.6566 20.0016 15.8584C20.1396 15.8782 20.3225 15.8995 20.5502 15.9225C20.8056 15.9483 21 16.1633 21 16.42Z" fill="currentColor"></path></svg>
                                        </span>
                                <input type="text" name="phone_number" placeholder="Phone Number">
                                @error('phone_number')
                                <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="FrmGp mb-3  col-lg-6">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M9 1V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9ZM20 11H4V19H20V11ZM8 13V15H6V13H8ZM13 13V15H11V13H13ZM18 13V15H16V13H18ZM7 5H4V9H20V5H17V7H15V5H9V7H7V5Z" fill="currentColor"></path></svg>
                                        </span>
                                <input type="text" class="datepicker" name="reservation_date" placeholder="Date">
                                <!--
                                    https://www.jqueryscript.net/time-clock/Simple-jQuery-Calendar-Date-Picker-Plugin-PickMeUp.html
                                    Document Datepicker khasti chizi kamo ziyad koni :)
                                -->
                                @error('reservation_date')
                                <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="FrmGp mb-3  col-lg-6">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM13 12H17V14H11V7H13V12Z" fill="currentColor"></path></svg>
                                        </span>
                                <select name="reservation_from" id="from">
                                    <option value="null" class="d-none">From</option>
                                    @for($i =11; $i <= 22; $i++ )
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('reservation_from')
                                <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="FrmGp mb-3  col-lg-6">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM13 12H17V14H11V7H13V12Z" fill="currentColor"></path></svg>
                                        </span>
                                <select name="reservation_to" id="to">
                                    <option value="null" class="d-none">To</option>
                                    @for($i =11; $i <= 22; $i++ )
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('reservation_to')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="FrmGp mb-3 col-lg-12">
                                <div class="modal-details-products-text">
                                    <p>Choose your party desk</p>
                                </div>
                                <div class="modal-details-products-selectopt">
                                    @foreach($desks_information as $desk)
                                        <button data-deskid="{{ $desk->id }}" data-desksize="{{ $desk->desk_size }}">
                                            Desk {{ $desk->desk_name }} - {{ $desk->desk_size }} seats
                                        </button>
                                    @endforeach
                                    <input type="hidden" name="desk_information" value="">
                                </div>
                                @error('desk_information')
                                <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="FrmGp mb-3  col-lg-12">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3 3H11V11H3V3ZM3 13H11V21H3V13ZM13 3H21V11H13V3ZM13 13H21V21H13V13Z" fill="currentColor"></path></svg>
                                        </span>
                                <select name="party_size" id="party_size">
                                    <option value="null" class="d-none">Party Size</option>
                                    <option value="">2</option>
                                    <option value="">4</option>
                                    <option value="">6</option>
                                </select>
                                @error('party_size')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="FrmGp mt-4 col-lg-12">
                                <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Mention any coments"></textarea>
                            </div>
                            <div class="FrmGp mt-4 col-lg-12 text-center">
                                <input type="hidden" name="reservation_url" value="{{ route('book_appointment') }}" disabled>
                                <input type="hidden" name="csrf_token" value="{{ csrf_token() }}" disabled>
                                <button id="set_reservation">
                                    Reserve
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32"><path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z" fill="currentColor"></path></svg>
                                </button>
                            </div>
                            <div id="danger" class="alert alert-danger FrmGp mt-4 col-lg-12 text-center"  style="display:none">HElllo world!</div>
                            <div id="success" class="alert alert-success FrmGp mt-4 col-lg-12 text-center" style="display:none">HELLO WORLD</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript" src="{{ asset('client-side/dist/js/reservation.js') }}"></script>
@endsection
