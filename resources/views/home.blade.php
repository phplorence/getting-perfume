@extends('layouts.app')
@section('content')
    @include('sweet::alert');
    <div class="">
        <div class="carouselOuter">
            <div class="carousel slide carousel-inner carouselInner" data-ride="carousel" id="carousel-1" style="background-color: #000;">
                <div class="carousel-inner" role="listbox">
                    <div id="overlay1"></div>
                    <div id="overlay2"></div>
                    <div id="titleExplore">
                        <div class="jumbotron titleExploreInner wow bounceIn">
                            <div align="center">
                                <p id="ajdustImageTitle"><img src="{{URL::asset('img/effel_tower.png')}}"/></p>
                            </div>
                            <div class="responsiveImgOuter" align="center">
                                <img class="img-responsive" src="{{URL::asset('img/title_perfume_name.png')}}"/>
                            </div>
                            <p class="text-center ajdustDescription" class="text-center">Chuyên Nước Hoa Pháp Chính Hãng</p>
                            <p class="exploreInner" align="center"><a id="ajdustBtnExplore" role="button" href="#">Khám phá</a></p>
                            <div align="center">
                                <p id="ajdustImageReadmore"><img src="{{URL::asset('img/readmore.png')}}"/></p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{URL::asset('img/1.jpg')}}" alt="Slide Image" class="img-fluid tales">
                    </div>
                    <div class="item"><img src="{{URL::asset('img/2.jpg')}}" alt="Slide Image" class="img-fluid tales"></div>
                    <div class="item active"><img src="{{URL::asset('img/3.jpg')}}" alt="Slide Image" class="img-fluid tales"></div>
                </div>
                <div style="display: none;"><a class="left carousel-control" href="#carousel-1" role="button" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#carousel-1" role="button"
                                                                                                                                                                                                                            data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i><span class="sr-only">Next</span></a></div>
                <ol class="carousel-indicators">
                    <li data-target="#carousel-1" data-slide-to="0"></li>
                    <li data-target="#carousel-1" data-slide-to="1"></li>
                    <li data-target="#carousel-1" data-slide-to="2" class="active"></li>
                </ol>
            </div>
        </div>

        <div class="hotOuter">
            <div class="jumbotron titleExploreInner">
                <div align="center" class="exploreImageIcon">
                    <p id="ajdustImageTitle"><img src="{{URL::asset('img/ic_rosie.png')}}"/></p>
                </div>
                <div align="center" class="responsiveImgOuter exploreImg">
                    <img src="{{URL::asset('img/title_perfume_hot.png')}}"/>
                </div>
                <p class="text-center ajdustDescription sologan">Nước Hoa Pháp Chính Hãng</p>
                <div class="hotPerfumeOuter">
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp">
                        <div class="thumbnail">
                            <img src="{{URL::asset('img/perfume_demo.png')}}" alt="perfume" width="240px;" height="240px;"/>
                            <div class="caption">
                                <h2 class="text-center">Mini Versace Bright Absolu</h2>
                                <p class="text-center description">Nước hoa mini Versace bright absolu ( Hồng Đậm ) 5ml.</p>
                                <p class="text-center currency">365.000 ₫</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp">
                        <div class="thumbnail">
                            <img src="{{URL::asset('img/perfume_demo.png')}}" alt="perfume" width="240;" height="240px;"/>
                            <div class="caption">
                                <h2 class="text-center">Mini Versace Bright Absolu</h2>
                                <p class="text-center description">Nước hoa mini Versace bright absolu ( Hồng Đậm ) 5ml.</p>
                                <p class="text-center currency">365.000 ₫</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp">
                        <div class="thumbnail">
                            <img src="{{URL::asset('img/perfume_demo.png')}}" alt="perfume" width="240px;" height="240px;"/>
                            <div class="caption">
                                <h2 class="text-center">Mini Versace Bright Absolu</h2>
                                <p class="text-center description">Nước hoa mini Versace bright absolu ( Hồng Đậm ) 5ml.</p>
                                <p class="text-center currency">365.000 ₫</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp">
                        <div class="thumbnail">
                            <img src="{{URL::asset('img/perfume_demo.png')}}" alt="perfume" width="240px;" height="240px;"/>
                            <div class="caption">
                                <h2 class="text-center">Mini Versace Bright Absolu</h2>
                                <p class="text-center description">Nước hoa mini Versace bright absolu ( Hồng Đậm ) 5ml.</p>
                                <p class="text-center currency">365.000 ₫</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-center btnDetail"><span>Xem chi tiết</span></p>
            </div>
        </div>

        <div class="newOuter">
            <div class="jumbotron titleExploreInner">
                <div align="center">
                    <p id="ajdustImageTitle"><img src="img/ic_rosie.png"/></p>
                </div>
                <div align="center" class="responsiveImgOuter exploreImg">
                    <img src="{{URL::asset('img/title_perfume_new.png')}}"/>
                </div>
                <p class="text-center ajdustDescription sologan">Nước Hoa Pháp Chính Hãng</p>
                <div class="newPerfumeOuter">
                    <div class="col-md-4 col-sm-6 col-xs-12 text-center wow fadeInUp">
                        <div class="thumbnail overrideImage">
                            <img src="{{URL::asset('img/perfume_demo_2.png')}}"/>
                            <div class="textPerfume">
                                <p class="namePerfume">Nos Parfums</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 text-center wow fadeInUp">
                        <div class="thumbnail overrideImage">
                            <img src="{{URL::asset('img/perfume_demo_2.png')}}"/>
                            <div class="textPerfume">
                                <p class="namePerfume">Nos Parfums</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 text-center wow fadeInUp">
                        <div class="thumbnail overrideImage">
                            <img src="{{URL::asset('img/perfume_demo_2.png')}}"/>
                            <div class="textPerfume">
                                <p class="namePerfume">Nos Parfums</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="newPerfumeOuter">
                    <div class="col-md-4 col-sm-6 col-xs-12 text-center wow fadeInUp">
                        <div class="thumbnail overrideImage">
                            <img src="{{URL::asset('img/perfume_demo_2.png')}}"/>
                            <div class="textPerfume">
                                <p class="namePerfume">Nos Parfums</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 text-center wow fadeInUp">
                        <div class="thumbnail overrideImage">
                            <img src="{{URL::asset('img/perfume_demo_2.png')}}"/>
                            <div class="textPerfume">
                                <p class="namePerfume">Nos Parfums</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 text-center wow fadeInUp">
                        <div class="thumbnail overrideImage">
                            <img src="{{URL::asset('img/perfume_demo_2.png')}}"/>
                            <div class="textPerfume">
                                <p class="namePerfume">Nos Parfums</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="consultOuter">
            <div class="jumbotron titleExploreInner">
                <div>
                    <div align="center">
                        <p id="ajdustImageTitle"><img src="{{URL::asset('img/ic_rosie.png')}}"/></p>
                    </div>
                    <div align="center" class="responsiveImgOuter">
                        <img src="{{URL::asset('img/title_perfume_consult.png')}}"/>
                    </div>
                </div>

                <p class="text-center ajdustDescription sologan">Nước Hoa Pháp Chính Hãng</p>
                <div class="consultPerfumeOuter wow fadeInUp">
                    <div class="textDescription">
                        Nước hoa đã trở thành của riêng mình khi Louis XV lên ngôi trong thế kỷ 18.<br> Việc sử dụng nước hoa ở Pháp tăng đều đặn. Vào thế kỷ 18, cây thơm<br> đã được trồng ở vùng Grasse của Pháp để cung cấp cho ngành công nghiệp<br> nước hoa đang phát triển với nguyên liệu thô.
                    </div>
                    <div>
                        <p class="btnExplore"><span>Khám phá</span></p>
                    </div>
                </div>
                <div class="consultPerfumeOuter">
                    <div class="detailConsultPerfume">
                        <div class="col-md-6 col-sm-6 col-xs-12 text-center padding-0 perfumeLeft wow fadeInUp">
                            <div class="imgInfo">
                                <img src="{{URL::asset('img/perfume_more_detail.png')}}"/>
                            </div>
                            <div class="textInfo">
                                <h3>NOS POINTS DE VENTE</h3>
                                <hr class="hr">
                                <p>Nước hoa đã trở thành của riêng mình khi Louis XV lên ngôi trong thế kỷ 18</p>
                                <p class="btn">Nos Parfums</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 text-center padding-0 perfumeRight wow fadeInUp">
                            <div class="imgInfo">
                                <img src="{{URL::asset('img/perfume_more_detail.png')}}"/>
                            </div>
                            <div class="textInfo">
                                <h3>NOS POINTS DE VENTE</h3>
                                <hr class="hr">
                                <p>Nước hoa đã trở thành của riêng mình khi Louis XV lên ngôi trong thế kỷ 18</p>
                                <p class="btn">Nos Parfums</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection