<!DOCTYPE html>
<html dir="ltr">
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sadra Restaurant</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('client-side/dist/css/style.css') }}">
    <script type="text/javascript" src="{{ asset('client-side/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('client-side/dist/js/jquery-3.7.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('client-side/dist/js/script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('client-side/dist/js/owl.carousel.min.js') }}"></script>
</head>
<body>
<div class="page-wrapper h-100-vh m-0">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="login-form-area">
                    <form action="{{ route('register') }}" method="post">
                        <div class="login-form-container">
                            <h3>Regsiter</h3>
                            <p>register with your email address</p>
                            <div class="ContactFormBox-Form-Area mt-3">
                                @error('email')
                                <div class="row">
                                    <span class="alert alert-danger">{{ $message }}</span>
                                </div>
                                @enderror
                                @error('name')
                                <div class="row">
                                    <span class="alert alert-danger">{{ $message }}</span>
                                </div>
                                @enderror
                                @error('password')
                                <div class="row">
                                    <span class="alert alert-danger">{{ $message }}</span>
                                </div>
                                @enderror
                                <div class="row">
                                    <div class="FrmGp mb-3 col-lg-12">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H18C18 18.6863 15.3137 16 12 16C8.68629 16 6 18.6863 6 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11Z" fill="currentColor"></path></svg>
                                                </span>
                                        <input type="text" placeholder="Your Name" name="name">
                                    </div>
                                    <div class="FrmGp mb-3 col-lg-12">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C13.6418 20 15.1681 19.5054 16.4381 18.6571L17.5476 20.3214C15.9602 21.3818 14.0523 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12V13.5C22 15.433 20.433 17 18.5 17C17.2958 17 16.2336 16.3918 15.6038 15.4659C14.6942 16.4115 13.4158 17 12 17C9.23858 17 7 14.7614 7 12C7 9.23858 9.23858 7 12 7C13.1258 7 14.1647 7.37209 15.0005 8H17V13.5C17 14.3284 17.6716 15 18.5 15C19.3284 15 20 14.3284 20 13.5V12ZM12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9Z" fill="currentColor"></path></svg>
                                                </span>
                                        <input type="text" placeholder="Your Email Address" name="email">
                                    </div>
                                    <div class="FrmGp mb-3  col-lg-12">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M18 8H20C20.5523 8 21 8.44772 21 9V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V9C3 8.44772 3.44772 8 4 8H6V7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7V8ZM5 10V20H19V10H5ZM11 14H13V16H11V14ZM7 14H9V16H7V14ZM15 14H17V16H15V14ZM16 8V7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7V8H16Z" fill="currentColor"></path></svg>
                                                </span>
                                        <input type="text" placeholder="Your Password" name="password">
                                    </div>
                                    <div class="FrmGp mb-3  col-lg-12">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M18 8H20C20.5523 8 21 8.44772 21 9V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V9C3 8.44772 3.44772 8 4 8H6V7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7V8ZM5 10V20H19V10H5ZM11 14H13V16H11V14ZM7 14H9V16H7V14ZM15 14H17V16H15V14ZM16 8V7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7V8H16Z" fill="currentColor"></path></svg>
                                                </span>
                                        <input type="text" placeholder="Reenter Password For Verification " name="password_confirmation">
                                    </div>
                                    <div class="FrmGp mt-4 col-lg-12">
                                        <button class="w-100">
                                            Create Account
                                        </button>
                                    </div>
                                    <div class="register-link-login-form-area">
                                        <p class="mb-0">Already have an account ? <a href="{{ route('login') }}">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
