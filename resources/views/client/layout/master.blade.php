<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.radiustheme.com/demo/html/neeon/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 Sep 2024 11:28:30 GMT -->

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Neeon | Home 01 - Main </title>

    @include('client.layout.partials.css')


</head>

<body>

    <!-- Start wrapper -->
    <div id="wrapper" class="wrapper">
        <!-- Start main-content -->
        <div id="main_content" class="footer-fixed">
            <!-- Header -->
            <header class="rt-header sticky-on">

                <!-- sticky-placeholder -->
                <div id="sticky-placeholder"></div>

                <!-- start  topbar -->
                @include('client.layout.partials.header-top')

                <!-- end topbar -->

                <!-- Header Main -->
                <div class="header-main header-main-style-1 navbar-wrap" id="navbar-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="d-flex align-items-center justify-content-between">

                                <!-- start logo here -->
                                <div class="site-branding">
                                    <a class="dark-logo" href="{{ route('home.index') }}">
                                        <img width="162" height="52"
                                            src="{{ asset('admin/assets/images/logo.webp') }}" alt="neeon">
                                    </a>

                                </div>
                                <!-- end logo here -->

                                <!-- start main menu -->
                                <div class="main-menu">
                                    <nav class="main-menu__nav">
                                        <ul>
                                            <li class=" active">
                                                <a class="animation" href="{{ route('home.index') }}">Trang Chủ</a>
                                            </li>
                                            <li class="main-menu__nav_sub">
                                                <a class="animation" href="">Tin Tức</a>
                                                <ul class="main-menu__dropdown">
                                                    @foreach ($listCategories as $category)
                                                        <li><a
                                                                href="{{ route('home.show', ['home' => $category->id]) }}">{{ $category->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </li>
                                            <li class="">
                                                <a class="animation" href="/gioithieu">Giới Thiệu </a>

                                            </li>
                                            <li class="">
                                                <a class="animation" href="/lienhe">Liên Hệ</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- end main menu -->

                                <!-- start header actions -->
                                <ul class="header-action-items">

                                    @guest
                                        @if (Route::has('login'))
                                            <li class="nav-item">
                                                <a style="color: #9d9d9d" class="nav-link"
                                                    href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                                            </li>
                                        @endif

                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a style="color: #9d9d9d" class="nav-link"
                                                    href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item">
                                            <a style="color: #9d9d9d" class="nav-link" href="{{ route('posts.index') }}"
                                                style="font-size: 50px"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor"
                                                    class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z" />
                                                </svg></a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a style="color: #9d9d9d" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Đăng xuất') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>

                                    @endguest
                                    {{-- <li class="item humburger offcanvas-menu-btn menu-status-open">
                              <button type="submit">ádas</button>
                              <span>ád</span>
                           </li> --}}
                                </ul>
                                <!-- end header actions -->

                            </div>

                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end container -->
                </div>
                <!-- End Header Main -->

            </header>
            <!-- end header -->

            <!-- BODY -->
            <main>
                <!-- start main post section style 1 -->
                @yield('content')
            </main>
            <!-- End BODY -->

            <!-- Start Footer -->
            <footer class="footer">

                <div class="footer-top footer-style-1">
                    <div class="container">
                        <div class="row gutter-30">

                            <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-delay="200ms"
                                data-wow-duration="800ms">
                                <div class="footer-widget">
                                    <div class="logo footer-logo">
                                        <a class="dark-logo" href="/client/index-2.html">
                                            <img width="162" height="52"
                                                src="{{ asset('admin/assets/images/logo.webp') }}" alt="neeon">
                                        </a>
                                    </div>
                                    <p class="text">
                                        When an unknown printer took a galley
                                        and scrambled it to make specimen
                                        book not only five centurie.
                                    </p>
                                    <ul class="footer-social gutter-15">
                                        <li class="social-item">
                                            <a href="/client/https://www.facebook.com/" class="social-link fb"
                                                target="_blank">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="social-item">
                                            <a href="/client/https://twitter.com/" class="social-link tw"
                                                target="_blank">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="social-item">
                                            <a href="/client/https://vimeo.com/" class="social-link vm" target="_blank">
                                                <i class="fab fa-vimeo-v"></i>
                                            </a>
                                        </li>
                                        <li class="social-item">
                                            <a href="/client/https://www.pinterest.com/" class="social-link pn"
                                                target="_blank">
                                                <i class="fab fa-pinterest-p"></i>
                                            </a>
                                        </li>
                                        <li class="social-item">
                                            <a href="/client/https://www.whatsapp.com/" class="social-link wh"
                                                target="_blank">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-delay="400ms"
                                data-wow-duration="800ms">
                                <div class="footer-widget">
                                    <h3 class="footer-widget-title">Recent Posts</h3>

                                    <!--  start footer-post-list -->
                                    <div class="footer-post-list">
                                        <div class="item mb--30">
                                            <div class="rt-post post-sm white-style">
                                                <div class="post-img">
                                                    <a href="/client/single-post1.html">
                                                        <img src="/client/media/gallery/post-sm_1.jpg" alt="post"
                                                            width="100" height="100">
                                                    </a>
                                                </div>
                                                <div class="ms-3 post-content">
                                                    <h4 class="post-title">
                                                        <a href="/client/single-post1.html">
                                                            Top Beste ampute are
                                                            Speak Market.
                                                        </a>
                                                    </h4>
                                                    <span class="rt-meta">
                                                        <i class="far fa-calendar-alt icon"></i>
                                                        DECEMBER 9, 2022
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="rt-post post-sm white-style">
                                                <div class="post-img">
                                                    <a href="/client/single-post1.html">
                                                        <img src="/client/media/gallery/post-sm_2.jpg" alt="post"
                                                            width="100" height="100">
                                                    </a>
                                                </div>
                                                <div class="ms-3 post-content">
                                                    <h4 class="post-title">
                                                        <a href="/client/single-post1.html">
                                                            Top Beste ampute are
                                                            Speak Market.
                                                        </a>
                                                    </h4>
                                                    <span class="rt-meta">
                                                        <i class="far fa-calendar-alt icon"></i>
                                                        DECEMBER 9, 2022
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--  end footer-post-list -->

                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-xl-3 col-md-6 wow fadeInUp d-flex justify-content-xl-center justify-content-start"
                                data-wow-delay="400ms" data-wow-duration="800ms">
                                <div class="footer-widget">
                                    <h3 class="footer-widget-title">Categories</h3>
                                    <ul class="widget-list cat-list">
                                        @foreach ($listCategories as $category)
                                            <li class="widget-list-item"><a class="widget-list-link"
                                                    href="{{ route('home.show', ['home' => $category->id]) }}">{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-delay="600ms"
                                data-wow-duration="800ms">
                                <div class="footer-widget">
                                    <h3 class="footer-widget-title">Instagram</h3>
                                    <div class="insta-gallery">
                                        <div class="galleryitem">
                                            <a href="/client/https://www.instagram.com/">
                                                <img src="/client/media/gallery/ins-gallery_1.jpg" width="100"
                                                    height="90" alt="gallery1">
                                            </a>
                                        </div>
                                        <div class="galleryitem">
                                            <a href="/client/https://www.instagram.com/">
                                                <img src="/client/media/gallery/ins-gallery_2.jpg" width="100"
                                                    height="90" alt="gallery2">
                                            </a>
                                        </div>
                                        <div class="galleryitem">
                                            <a href="/client/https://www.instagram.com/">
                                                <img src="/client/media/gallery/ins-gallery_3.jpg" width="100"
                                                    height="90" alt="gallery3">
                                            </a>
                                        </div>
                                        <div class="galleryitem">
                                            <a href="/client/https://www.instagram.com/">
                                                <img src="/client/media/gallery/ins-gallery_4.jpg" width="100"
                                                    height="90" alt="gallery4">
                                            </a>
                                        </div>
                                        <div class="galleryitem">
                                            <a href="/client/https://www.instagram.com/">
                                                <img src="/client/media/gallery/ins-gallery_5.jpg" width="100"
                                                    height="90" alt="gallery5">
                                            </a>
                                        </div>
                                        <div class="galleryitem">
                                            <a href="/client/https://www.instagram.com/">
                                                <img src="/client/media/gallery/ins-gallery_6.jpg" width="100"
                                                    height="90" alt="gallery6">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                        </div>
                    </div>
                </div>
                <!-- End footer top -->

                <div class="footer-bottom">
                    <div class="container">
                        <div class="footer-bottom-area d-flex align-items-center justify-content-center">
                            <p class="copyright-text mb-0 wow fadeInUp" data-wow-delay="200ms"
                                data-wow-duration="800ms">
                                <span class="currentYear"></span> © neeon all right reserved by
                                <a href="/client/https://www.radiustheme.com/" rel="nofollow">RadiusTheme</a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End footer bottom -->

            </footer>
            <!-- End  Footer -->

        </div>
        <!-- End main-content -->
        <!-- Dependency Scripts -->
        @include('client.layout.partials.js')

</body>


<!-- Mirrored from www.radiustheme.com/demo/html/neeon/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 Sep 2024 11:28:31 GMT -->

</html>
