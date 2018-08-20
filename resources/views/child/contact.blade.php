<!-- page content -->
<div id="page_content_ajax">
    <div class="breadcumb-area bg-img-5 black-opacity">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Contact us</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>/</li>
                            <li class="active">contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-area bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <div class="contact-form">
                        <div class="cf-msg"></div>
                        <form action="mail.php" method="post" id="cf">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <input type="text" placeholder="Name" id="fname" name="fname">
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <input type="text" placeholder="Email" id="email" name="email">
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" placeholder="Subject" id="subject" name="subject">
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <textarea class="contact-textarea" placeholder="Message" id="msg" name="msg"></textarea>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <button id="submit" class="cont-submit btn-contact btn-style" name="submit">SEND MESSAGE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="contact-wrap">
                        <ul>
                            <li>
                                <i class="fa fa-phone"></i>
                                Phone number
                                <p>
                                    <span>+ (0012) 123 456 789</span>
                                    <span>+ (0012) 123 456 789</span>
                                </p>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                Email Id
                                <p>
                                    <span>info145@gmail.com</span>
                                    <span>info145@gmail.com</span>
                                </p>
                            </li>
                            <li>
                                <i class="fa fa-location-arrow"></i>
                                Location
                                <p>
                                    <span>+227 Marion Street Address Here Columbia, SC 29201</span>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="googleMap"></div>
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
