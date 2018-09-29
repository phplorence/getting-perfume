<?php
/**
 * Created by PhpStorm.
 * User: lorence
 * Date: 10/08/2018
 * Time: 15:52
 */
?>
<!-- page content -->
<div id="page_content_ajax">
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
                        <p class="text-center ajdustDescription" class="text-center">Nước Hoa giá sỉ - bán buôn nước hoa - chuyên cung cấp phân phối sỉ nước hoa - nguồn hàng nước hoa</p>
                        <p class="exploreInner" align="center"><a id="ajdustBtnExplore" href="#explorePerfume" class="smooth-goto" role="button">Khám phá</a></p>
                        <div align="center">
                            <p id="ajdustImageReadmore"><img src="{{URL::asset('img/readmore.png')}}"/></p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="{{URL::asset('img/4.png')}}" alt="Slide Image" class="img-fluid tales">
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
                @if(isset($hotPerfumes))
                    @foreach($hotPerfumes as $perfume)
                        <div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp">
                            <div class="thumbnail">
                                <img src="{{URL::asset('perfume/'.$perfume->path_image)}}" alt="perfume" style="width:240px; height:240px;"/>
                                <div class="caption">
                                    <h2 class="text-center">
                                        <?php
                                        if (strlen(strip_tags($perfume->name)) > 21) {
                                            echo substr(strip_tags($perfume->name),0,21)."...";
                                        } else {
                                            echo $perfume->name;
                                        }
                                        ?>
                                    </h2>
                                    <p class="text-center description">
                                        <?php
                                        if (strlen(strip_tags($perfume->description)) > 120) {
                                            echo substr(strip_tags($perfume->description),0,120)."...";
                                        } else {
                                            if (strlen(strip_tags($perfume->description)) < 40)
                                                echo strip_tags($perfume->description)."</br></br>";
                                            else
                                                echo strip_tags($perfume->description)."</br>";
                                        }
                                        ?>
                                    </p>
                                    <p class="text-center currency">
                                    <?php
                                    echo number_format($perfume->original_price, 0, '', ','). " VND";
                                    ?>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div style="margin: 0 auto;">
                <p class="text-center btnDetail"><span><a id="perfume-list-host" href="javascript:void(0)"><span>Xem chi tiết</span></a></span></p>
            </div>
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
                @if(isset($newPerfumes))
                    @foreach($newPerfumes as $perfume)
                        <div class="col-md-4 col-sm-6 col-xs-12 text-center wow fadeInUp">
                            <div class="thumbnail overrideImage">
                                <img src="{{URL::asset('perfume/'.$perfume->path_image)}}" style="width: 362px; height: 521px;" />
                                <div class="textPerfume fdw-background" style="opacity: 0;">
                                    <p class="namePerfume">Nos Parfums</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div style="margin: 20px auto;">
                    <p class="text-center btnDetail"><span>Xem chi tiết</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="consultOuter" id="explorePerfume">
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
                    <p class="btnExplore"><span><a href="">Khám phá</a></span></p>
                </div>
            </div>
            <div class="consultPerfumeOuter">
                <div class="detailConsultPerfume">
                    <div class="col-md-6 col-sm-6 col-xs-12 text-center padding-0 perfumeLeft wow fadeInUp">
                        <div class="imgInfo">
                            <img src="{{URL::asset('img/perfume_more_detail.png')}}"/>
                        </div>
                        <div class="textInfo" align="center">
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
                        <div class="textInfo" align="center">
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
<!-- /page content -->
