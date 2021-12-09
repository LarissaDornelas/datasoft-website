<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Datasoft</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">



</head>

<body>

    <header>
        <div class="header-area">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="#">
                                    <img src="img/logo.svg" alt="" style="max-height: 55px">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="main-menu  d-none d-lg-block text-center">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="#aboutUs">Quem somos</a></li>
                                        <li><a href="#services">Serviços</a></li>
                                        <li><a href="" onClick="location.href='/portfolio'">Portfólio</a></li>
                                        <li><a href="#contact">Fale conosco</a></li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-2 d-none d-lg-block">
                            <div class="log_chat_area d-flex align-items-end">
                                <a href="{{route('downloads')}}" class="say_hi"><img src="img/svg_icon/download-icon.svg" alt="" style="margin-right: 10px" /> Downloads</a>
                            </div>

                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
            <div class="container">
                <div class="row align-items-center justify-content-start">
                    <div class="col-lg-10 col-md-10">
                        <div class="slider_text">
                            <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".1s">
                                {{$homeData[0]->text}}
                            </h3>
                            <a class="boxed-btn3 wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s" onClick="location.href='/portfolio'">Saiba mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- service_area  -->
    <div id="aboutUs" class="service_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_title text-center mb-70">
                        <span class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">Quem somos</span>
                        <h3 class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".2s">{{$aboutData['text']}}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay=".4s">
                        <div class="icon">
                            <img src="img/svg_icon/mission.svg" alt="">
                        </div>
                        <h3>Missão</h3>
                        <p>{{$aboutData['mission']}}</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="icon">
                            <img src="img/svg_icon/eyesight.svg" alt="">
                        </div>
                        <h3>Visão</h3>
                        <p>{{$aboutData['vision']}}</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center wow fadeInRight" data-wow-duration="1.2s" data-wow-delay=".4s">
                        <div class="icon">
                            <img src="img/svg_icon/values.svg" alt="">
                        </div>
                        <h3>Valores</h3>
                        <p>{{$aboutData['values']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ service_area  -->

    <div id="services" class="about_area">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-5 offset-lg-1">
                    <div class="about_info">
                        <div class="section_title white_text">
                            <span class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">Serviços</span>
                            <p class="mid_text wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">{{$servicesData[0]->text}}</p>
                            <a href="#" class="boxed-btn3 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s" a href="" onClick="location.href='/portfolio'">Ver portfólio</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div data-scroll-index="0" class="get_in_tauch_area" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_title text-center mb-90">
                        <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">Fale conosco</h3>
                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">{{$contactData[0]->text}}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="touch_form">
                        <form method="POST" action="{{ route('contactUs') }}">
                            {{ csrf_field()}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="single_input wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                        <input required type="text" name="name" placeholder="Seu nome">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single_input wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                                        <input required type="email" name="email" placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="single_input wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                        <input id="phone" required type="text" name="phone" placeholder="Telefone">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="single_input wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                        <input required type="text" name="subject" placeholder="Assunto">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="single_input wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                                        <textarea required name="message" id="" cols="30" placeholder="Message" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="submit_btn wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
                                        <button class="boxed-btn3" type="submit">Enviar Mensagem</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- footer start -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-3">
                        <div class="footer_logo wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
                            <a href="index.html">
                                <img src="img/logo.svg" alt="" style="max-height: 40px">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-9">
                        <div class="menu_links">
                            <ul>
                                <li><a class="wow fadeInDown" href="#aboutUs">Quem somos</a></li>
                                <li><a class="wow fadeInDown" href="#services">Serviços</a></li>
                                <li><a class="wow fadeInDown" href="Portfolio.html">Portfólio</a></li>
                                <li><a class="wow fadeInDown" href="#contact">Fale conosco</a></li>


                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="socail_links">
                            <ul>
                                <li><a class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s" href="https://www.facebook.com/DataSoftAutomacao/" target="_blank"> <i class="fa fa-facebook"></i> </a></li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-12" style="margin:30px 0 -60px 0">
                        <div class="Description">
                            <p>Av Getulio Vargas, 4.726 Bairro Carneirinhos - João Monlevade - MG<br />
                                Fones: (31)3851-1585 - (31)3852-3009 - (31)9 8978-4857</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.3s">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--/ footer end  -->

    <!-- JS here -->
    <script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script src="{{asset('js/phone-mask.js')}}"></script>
    <script src="{{asset('js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('js/ajax-form.js')}}"></script>
    <script src="{{asset('js/waypoints.min.js')}}"></script>
    <script src="{{asset('js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('js/scrollIt.js')}}"></script>
    <script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/nice-select.min.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.min.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/gijgo.min.js')}}"></script>
    <!--contact js-->
    <script src="{{asset('js/contact.js')}}"></script>
    <!-- <script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script> -->
    <!-- <script src="{{asset('js/jquery.form.js')}}"></script> -->
    <!-- <script src="{{asset('js/jquery.validate.min.js')}}"></script> -->
    <!-- <script src="{{asset('js/mail-script.js')}}"></script> -->


</body>

</html>