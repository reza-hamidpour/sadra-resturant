@extends('client-side.layouts.base')
@section('content')
    <div class="my-account">
        <div class="container">
            <div id="my-account-mobile-menu">
                My Account Menu
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 15.0006L7.75732 10.758L9.17154 9.34375L12 12.1722L14.8284 9.34375L16.2426 10.758L12 15.0006Z" fill="currentColor"></path></svg>
            </div>
            <div class="row">
                @include('Users.layouts.menu')
                <div class="col-xl-9 col-lg-8 col-md-12">
                    <div class="my-account-content">
                        <div class="my-account-content-title">
                            <h4>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H18C18 18.6863 15.3137 16 12 16C8.68629 16 6 18.6863 6 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11Z" fill="currentColor"></path></svg>
                                <span>Personal information</span>
                            </h4>
                        </div>
                        <div class="row">
                            @if(isset($notify))
                                @include('Admin.layouts.notify')
                            @endif
                            @error('email')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                            @error('password')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                            @error('password_confirmation')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <form action="{{ route('user_information_update') }}" method="post">
                            @method("PATCH")
                            @csrf
                            <div class="mb-4">
                                <input type="text" name="name" placeholder="Your Name" value="{{ $user->name }}">
                            </div>
                            <div class="mb-4">
                                <input type="email" name="email" placeholder="Your Email Address" value="{{ $user->email }}" readonly>
                            </div>
                            <div class="mb-4">
                                <input type="password" name="password" placeholder="Your New Password" autocomplete="off">
                            </div>
                            <div class="mb-4">
                                <input type="password" name="password_confirmation" placeholder="Confirme your Password" autocomplete="off">
                            </div>
                            <div class="mt-4 text-end">
                                <button class="button-primary">Save Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
