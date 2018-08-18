<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuyên Trang Nước Hoa</title>
    <link rel="stylesheet" href="{{URL::asset('components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/animate.css')}}">
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
            <li class="topNavInner"><a href="https://www.google.com/">
                    <i class="fa fa-map-marker wow shake"></i></a>
            </li>

            <li class="topNavInner titleSite  wow slideInRight"><a href="#">Nước Hoa Quảng Ngãi</a></li>

            <li class="navbar-right topNavInner wow slideInLeft">
                <a href="#"> <i class="fa fa-twitter"></i></a>
            </li>

            <li class="navbar-right topNavInner wow slideInLeft">
                <a href="#"> <i class="fa fa-google-plus"></i></a>
            </li>

            <li class="navbar-right topNavInner wow slideInLeft">
                <a href="#"> <i class="fa fa-instagram"></i></a>
            </li>

            <li class="navbar-right topNavInner wow slideInLeft">
                <a href="#"> <i class="fa fa-facebook-official"></i></a>
            </li>

            <li class="navbar-right topNavInner wow slideInLeft">
                <a href="#"> <i class="fa fa-youtube-play"></i></a>
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
                    <a href="#" class="navbar-brand navbar-link">
                        <img class="img-responsive wow slideInLeft" src="{{URL::asset('img/ic_logo.png')}}" alt="logoSite"/>
                    </a>
                    <button class="navbar-toggle collapsed iconExpand" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav menuUlOuter">
                        <li class="menuItemOuter wow bounceIn" role="presentation" class="active"><a href="#"><span>TRANG CHỦ</span> </a></li>
                        <li class="menuItemOuter wow bounceIn" role="presentation"><a href="#"><span>NƯỚC HOA</span> </a></li>
                        <li class="menuItemOuter wow bounceIn" role="presentation"><a href="#"><span>BÀI VIẾT</span></a></li>
                        <li class="menuItemOuter wow bounceIn" role="presentation"><a href="#"><span>RAO VẶT</span></a></li>
                        <li class="menuItemOuter wow bounceIn" role="presentation"><a href="#"><span>LIÊN HỆ</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- Content Page -->
    @yield('content')
    <!-- End content Page -->

    <footer>
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
        <div class="footer_copyright">
            <p>COPYRIGHT &copy; CHUYÊN CUNG CẤP NƯỚC HOA PHÁP CHÍNH HÃNG</p>
        </div>
    </footer>
</div>
<script src="{{URL::asset('components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ URL::asset('components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script>
    $("#home").click (function (event) {
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
</script>
</body>
</html>