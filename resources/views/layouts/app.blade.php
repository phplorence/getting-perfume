<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chuyên Trang Nước Hoa</title>
    <link rel="stylesheet" href="{{URL::asset('components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="icon" type="image/png" href="{{URL::asset('img/favicon.png')}}">
    <link rel="stylesheet" href="{{URL::asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/animate.css')}}">
    <!-- flaticon.css -->
    <link rel="stylesheet" href="{{URL::asset('css/flaticon.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{URL::asset('css/contacts.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{URL::asset('css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{URL::asset('js/modernizr-2.8.3.min.js')}}"></script>

    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
    <script src="{{URL::asset('js/wow.js')}}"></script>
    <script type="text/javascript">
        new WOW().init();
    </script>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid topNav">
        <ul class="nav nav-tabs topNavOuter">
            <li class="topNavInner"><a id="map" href="javascript:void(0)">
                <i class="fa fa-map-marker wow shake"></i></a>
            </li>

            <li class="topNavInner titleSite  wow slideInRight"><a id="branch" href="javascript:void(0)">Nước Hoa</a></li>

            <li class="navbar-right topNavInner wow slideInLeft">
                <a href="https://plus.google.com/100299109617853865755" target="_blank"> <i class="fa fa-google-plus"></i></a>
            </li>

            <li class="navbar-right topNavInner wow slideInLeft">
                <a href="https://www.facebook.com/evanuochoa/" target="_blank"> <i class="fa fa-facebook-official"></i></a>
            </li>

            <li class="navbar-right topNavInner wow slideInLeft">
                <a href="https://www.youtube.com/channel/UCQzpDYpolWo4hmgvkRC6jxQ" target="_blank"> <i class="fa fa-youtube-play"></i></a>
            </li>

            <li class="navbar-right topNavInner searchBox wow slideInLeft"><a href="#">Nhập thông tin tìm kiếm </a></li>

            <li class="navbar-right topNavInner searchBox wow slideInLeft">
                <a href="#"> <i class="fa fa-search"></i></a>
            </li>
        </ul>
    </div>

    <div class="menuBarOuter">
        <nav class="navbar  menuNavInner">
            <div class="container-fluid">
                <div class="navbar-header menuBrandInner">
                    <a id="home" href="javascript:void(0)" class="navbar-brand navbar-link">
                        <img class="img-responsive wow slideInLeft" src="{{URL::asset('img/ic_logo.png')}}" alt="logoSite"/>
                    </a>
                    <button class="navbar-toggle collapsed iconExpand" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav menuUlOuter">
                        <li class="menuItemOuter wow bounceIn" role="presentation" class="active"><a id="nav_home" href=""><span>TRANG CHỦ</span> </a></li>
                        <li class="menuItemOuter wow bounceIn" role="presentation"><a href="{{ route('nav.perfume') }}"><span>NƯỚC HOA</span> </a></li>
                        <li class="menuItemOuter wow bounceIn" role="presentation"><a href=""><span>BÀI VIẾT</span></a></li>
                        <li class="menuItemOuter wow bounceIn" role="presentation"><a href=""><span>RAO VẶT</span></a></li>
                        <li class="menuItemOuter wow bounceIn" role="presentation"><a id="contact" href="javascript:void(0)"><span>LIÊN HỆ</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- Content Page -->
    @yield('content')
    <!-- End content Page -->
    <footer id="customfooter">
        <div class="footerInner">
            <p class="title">4 RAISONS D'ACHETER SUR LANCOME.FR</p>
            <p class="line"></p>
            <div class="specialContent">
                <div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp">
                    <div class="thumbnail">
                        <img src="{{URL::asset('img/img_gift.png')}}" alt="perfume"/>
                        <div class="caption promotion">
                            <h3 class="text-center">Mini Versace Bright Absolu</h3>
                            <p class="line"></p>
                            <p class="text-center description">Nước hoa mini Versace bright absolu ( Hồng Đậm ) 5ml.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp">
                    <div class="thumbnail">
                        <img src="{{URL::asset('img/img_deliver.png')}}" alt="perfume"/>
                        <div class="caption promotion">
                            <h3 class="text-center">Mini Versace Bright Absolu</h3>
                            <p class="line"></p>
                            <p class="text-center description">Nước hoa mini Versace bright absolu ( Hồng Đậm ) 5ml.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp">
                    <div class="thumbnail">
                        <img src="{{URL::asset('img/img_perfume.png')}}" alt="perfume"/>
                        <div class="caption promotion">
                            <h3 class="text-center">Mini Versace Bright Absolu</h3>
                            <p class="line"></p>
                            <p class="text-center description">Nước hoa mini Versace bright absolu ( Hồng Đậm ) 5ml.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp">
                    <div class="thumbnail">
                        <img src="{{URL::asset('img/img_heart.png')}}" alt="perfume"/>
                        <div class="caption promotion">
                            <h3 class="text-center">Mini Versace Bright Absolu</h3>
                            <p class="line"></p>
                            <p class="text-center description">Nước hoa mini Versace bright absolu ( Hồng Đậm ) 5ml.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="specialExtra">
                <div class="col-md-4 col-sm-4 col-xs-12 text-center wow fadeInUp">
                    <div class="thumbnail">
                        <div class="caption promotion">
                            <h2 class="text-center textSpecial">Danh mục sản phẩm</h2>
                            <p class="line"></p>
                            <p class="text-center description">Nước Hoa Pháp</p>
                            <p class="text-center description">Nước Hoa Pháp</p>
                            <p class="text-center description">Nước Hoa Pháp</p>
                            <p class="text-center description">Nước Hoa Chính Hãng</p>
                            <p class="text-center description">Nước Hoa Quảng Ngãi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 text-center wow fadeInUp">
                    <div class="thumbnail">
                        <div class="caption promotion">
                            <h2 class="text-center textSpecial">Danh mục sản phẩm</h2>
                            <p class="line"></p>
                            <p class="text-center description">Nước Hoa Pháp</p>
                            <p class="text-center description">Nước Hoa Pháp</p>
                            <p class="text-center description">Nước Hoa Pháp</p>
                            <p class="text-center description">Nước Hoa Chính Hãng</p>
                            <p class="text-center description">
                            <ul class="menuSocial">
                                <li class="topNavInner a">
                                    <a href="#"> <i class="fa fa-twitter"></i></a>
                                </li>

                                <li class="topNavInner">
                                    <a href="#"> <i class="fa fa-google-plus"></i></a>
                                </li>

                                <li class="topNavInner">
                                    <a href="#"> <i class="fa fa-instagram"></i></a>
                                </li>

                                <li class="topNavInner">
                                    <a href="#"> <i class="fa fa-facebook-official"></i></a>
                                </li>

                                <li class="topNavInner">
                                    <a href="#"> <i class="fa fa-youtube-play"></i></a>
                                </li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 text-center wow fadeInUp">
                    <div class="thumbnail">
                        <div class="caption promotion">
                            <h2 class="text-center textSpecial">Danh mục sản phẩm</h2>
                            <p class="line"></p>
                            <p class="text-center description">Nước Hoa Pháp</p>
                            <p class="text-center description">Nước Hoa Pháp</p>
                            <p class="text-center description">Nước Hoa Pháp</p>
                            <p class="text-center description">Nước Hoa Chính Hãng</p>
                            <p class="text-center description">Nước Hoa Quảng Ngãi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="copyright">
                            <p>
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> Chuyên cung cấp nước hoa pháp chính hãng <i class="fa fa-heart-o" aria-hidden="true"></i> bởi <a href="https://colorlib.com" target="_blank">Phong Perfume</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="socil-media-icon">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="{{URL::asset('components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ URL::asset('components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- owl.carousel.2.0.0-beta.2.4 css -->
<script src="{{ URL::asset('js/owl.carousel.min.js')}}"></script>
<!-- counterup.main.js -->
<script src="{{ URL::asset('js/counterup.main.js')}}"></script>
<!-- isotope.pkgd.min.js -->
<script src="{{ URL::asset('js/imagesloaded.pkgd.min.js')}}"></script>
<!-- isotope.pkgd.min.js -->
<script src="{{ URL::asset('js/isotope.pkgd.min.js')}}"></script>
<!-- jquery.waypoints.min.js -->
<script src="{{ URL::asset('js/jquery.waypoints.min.js')}}"></script>
<!-- jquery.magnific-popup.min.js -->
<script src="{{ URL::asset('js/jquery.magnific-popup.min.js')}}"></script>
<!-- jquery.slicknav.min.js -->
<script src="{{ URL::asset('js/jquery.slicknav.min.js')}}"></script>
<!-- wow js -->
<script src="{{ URL::asset('js/wow.min.js')}}"></script>
<!-- plugins js -->
<script src="{{ URL::asset('js/plugins.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbeBYsZSDkbIyfUkoIw1Rt38eRQOQQU0o"></script>
<script>
    function initialize() {
        var mapOptions = {
            zoom: 15,
            scrollwheel: false,
            center: new google.maps.LatLng(40.712764, -74.005667),
            styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#222222"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#222222"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#222222"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#222222"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#222222"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#222222"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#222222"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#222222"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#222222"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#222222"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#222222"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#222222"},{"lightness":17}]}]
        };

        var map = new google.maps.Map(document.getElementById('googleMap'),
            mapOptions);


        var marker = new google.maps.Marker({
            position: map.getCenter(),
            animation: google.maps.Animation.BOUNCE,
            map: map
        });

    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script src="{{ URL::asset('js/scripts.js')}}"></script>
<script>
    $("#home, #map, #branch, #nav_home").click (function (event) {
        event.preventDefault();
        $.ajax({
            url: '/home',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            type: "POST",
            beforeSend: function(){
                $('#modal-loading').modal('show');
            }
        })
            .done(function(data){
                $('#modal-loading').modal('hide');
                $('#page_content_ajax').replaceWith(data['html']);
            });
    });
    $("#contact").click (function (event) {
        event.preventDefault();
        $.ajax({
            url: '/contact',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            type: "GET",
            beforeSend: function(){
                $('#modal-loading').modal('show');
            }
        })
            .done(function(data){
                $('#modal-loading').modal('hide');
                $('#page_content_ajax').replaceWith(data['html']);
            });
    });
    $("#perfume-list-host").click (function (event) {
        event.preventDefault();
        $.ajax({
            url: '/nuoc-hoa/moi-ve',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            type: "GET",
            beforeSend: function(){
                $('#modal-loading').modal('show');
            }
        })
            .done(function(data){
                $('#modal-loading').modal('hide');
                $('#page_content_ajax').replaceWith(data['html']);
            });
    });
    $('a[name="perfumeHotDetail"]').click(function(event) {
        event.preventDefault();
        $.ajax({
            url: '/nuoc-hoa/chi-tiet',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            type: "GET",
            beforeSend: function(){
                $('#modal-loading').modal('show');
            }
        })
            .done(function(data){
                $('#modal-loading').modal('hide');
                $('#page_content_ajax').replaceWith(data['html']);
            });
    });
    $(document).on('click', '#perfumeHotDetail', function() {
        event.preventDefault();
        $.ajax({
            url: '/nuoc-hoa/chi-tiet',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            type: "GET",
            beforeSend: function(){
                $('#modal-loading').modal('show');
            }
        })
            .done(function(data){
                $('#modal-loading').modal('hide');
                $('#page_content_ajax').replaceWith(data['html']);
            });
    });
    $("#perfumeHotDetail").click(function (event) {
        event.preventDefault();
        $.ajax({
            url: '/nuoc-hoa/chi-tiet',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            type: "GET",
            beforeSend: function(){
                $('#modal-loading').modal('show');
            }
        })
            .done(function(data){
                $('#modal-loading').modal('hide');
                $('#page_content_ajax').replaceWith(data['html']);
            });
    });
    $('.smooth-goto').on('click', function() {
        $('html, body').animate({scrollTop: $(this.hash).offset().top - 50}, 1000);
        return false;
    });
    jQuery(document).ready(function($){
        $('.fdw-background').hover(
            function () {
                $(this).animate({opacity:'1'});
            },
            function () {
                $(this).animate({opacity:'0'});
            });
    });

</script>
</body>
</html>