<!-- page content -->
<div id="page_content_ajax">
    <div class="blog-area bg-1 hot-perfume">
        <div class="container">
            <div class="row">
                @if(isset($hotPerfumes))
                    @foreach($hotPerfumes as $perfume)
                        <div class="col-xs-12 col-md-4 col-sm-6">
                            <div class="blog-wrap">
                                <div class="blog-img">
                                    <img src="{{URL::asset('perfume/'.$perfume->path_image)}}" alt="perfume" style="width: 360px; height: 360px;" />
                                </div>
                                <div class="blog-content">
                                    <ul class="blog-meta">
                                        <li><a href="#"><i class="fa fa-clock-o"></i> June, 23, 2017</a></li>
                                        <li><a href="#"><i class="fa fa-user"></i> Admin</a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i> 4</a></li>
                                    </ul>
                                    <h3>
                                        <?php
                                            if (strlen(strip_tags($perfume->name)) > 21) {
                                                echo substr(strip_tags($perfume->name),0,21)."...";
                                            } else {
                                                echo $perfume->name;
                                            }
                                        ?>
                                    </h3>
                                    <p>
                                        <?php
                                            if (strlen(strip_tags($perfume->description)) > 160) {
                                                echo mb_substr(strip_tags($perfume->description),0,160)."...";
                                            } else {
                                                echo $perfume->description;
                                            }
                                        ?>
                                    </p>
                                    <a id="perfumeHotDetail" name="perfumeHotDetail" href="javascript:void(0)">Chi tiết <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="col-xs-12">
                    <div class="pagination-wrap text-center">
                        <ul>
                            <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li> <span>3</span></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#customfooter').css({
        'margin-top': '-40px',
        'position': 'absolute',
        'width': '100%',
        'display': 'inline-block'
    });
</script>
<!-- /page content -->

{{--
https://colorlib.com/wp/templates/page/2/
https://colorlib.com/wp/template/tattooz/--}}
