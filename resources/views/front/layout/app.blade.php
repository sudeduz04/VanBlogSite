<!doctype html>
<html lang="tr">

<head>
    <title>Trips &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('front/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/aos.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">

    <style>
        html{
            scroll-behavior: smooth;
        }
        .background-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .ftco-blocks-cover-1 {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        .site-section-cover.overlay {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .site-navbar{
            padding-bottom: 0;
            padding-top: 0;
        }

        .site-navbar .site-logo a img{
            width: 100px;
        }

        .category-section {
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .special:hover{
            background-color: #ccb9d1;
        }

    </style>
</head>


<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


<div class="site-wrap" id="home-section">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>



    <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
            <div class="row align-items-center position-relative">

                <div class="col-3 ">
                    <div class="site-logo">
                        <a href="" class="font-weight-bold">
                            <img src="{{asset('front/V.png')}}" alt="Image" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="col-9  text-right">


                    <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>



                    <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav ml-auto">
                            <li><a href="{{route('front.show')}}" class="nav-link">Home</a></li>
                            @foreach($categoryModel as $category)
                                <li>
                                    <a href="#{{ strtolower($category->name) }}" class="nav-link special">{{ $category->name }}</a>
                                </li>
                            @endforeach
                            <li><a href="#contact" class="nav-link">Contact</a></li>
                            @guest
                                <li><a href="{{ route('login') }}">Giriş Yap</a></li>
                            @else
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profil</a></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Çıkış Yap</a></li>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </nav>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </div>


            </div>
        </div>

    </header>

@yield('content')
    <footer class="site-footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <h2 class="footer-heading mb-3">Instagram</h2>
                    <div class="row">
                        <div class="col-4 gal_col">
                            <a href="#"><img src="" alt="Image" class="img-fluid"></a>
                        </div>
                        <div class="col-4 gal_col">
                            <a href="#"><img src="" alt="Image" class="img-fluid"></a>
                        </div>
                        <div class="col-4 gal_col">
                            <a href="#"><img src="" alt="Image" class="img-fluid"></a>
                        </div>
                        <div class="col-4 gal_col">
                            <a href="#"><img src="" alt="Image" class="img-fluid"></a>
                        </div>
                        <div class="col-4 gal_col">
                            <a href="#"><img src="" alt="Image" class="img-fluid"></a>
                        </div>
                        <div class="col-4 gal_col">
                            <a href="#"><img src="" alt="Image" class="img-fluid"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 ml-auto">
                    <div class="row">
                        <div class="col-lg-6 ml-auto">
                            <h2 class="footer-heading mb-4">Quick Links</h2>
                            <ul class="list-unstyled">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Terms of Service</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <h2 class="footer-heading mb-4">Newsletter</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt odio iure animi ullam quam, deleniti rem!</p>
                            <form action="#" class="d-flex" class="subscribe">
                                <input type="text" class="form-control mr-3" placeholder="Email">
                                <input type="submit" value="Send" class="btn btn-primary">
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <div class="border-top pt-5">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </footer>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

{{--<script src="{{asset('front/js/jquery-3.3.1.min.js')}}"></script>--}}
{{--<script src="{{asset('front/js/jquery-migrate-3.0.0.js')}}"></script>--}}
{{--<script src="{{asset('front/js/popper.min.js')}}"></script>--}}
{{--<script src="{{asset('front/js/bootstrap.min')}}.js"></script>--}}
{{--<script src="{{asset('front/js/owl.carousel.min.js')}}"></script>--}}
{{--<script src="{{asset('front/js/jquery.sticky.js')}}"></script>--}}
{{--<script src="{{asset('front/js/jquery.waypoints.min.js')}}"></script>--}}
{{--<script src="{{asset('front/js/jquery.animateNumber.min.js')}}"></script>--}}
{{--<script src="{{asset('front/js/jquery.fancybox.min.js')}}"></script>--}}
{{--<script src="{{asset('front/js/jquery.stellar.min.js')}}"></script>--}}
{{--<script src="{{asset('front/js/jquery.easing.1.3.js')}}"></script>--}}
{{--<script src="{{asset('front/js/bootstrap-datepicker.min.js')}}"></script>--}}
{{--<script src="{{asset('front/js/isotope.pkgd.min.js')}}"></script>--}}

{{--<script src="{{asset('front/js/main.js')}}"></script>--}}

</body>

</html>

