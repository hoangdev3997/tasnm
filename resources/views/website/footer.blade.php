<!-- brand section start -->
<section class="section-padding-top">
    <div class="testimonials brand-logo">
        <div class="re-testimonials">
            <div class="container">
                <div class="row text-center">
                    <div class="col-xs-12">
                        <div class="section-title">
                            <h3 class="h3bd" style="color:#FFF">Đối tác</h3>
                            <div style="color:#FFF" class="section-icon">
                                <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div id="brand-logo" class="re-owl-carousel21 owl-carousel product-slider owl-theme">
                        @php
                             $brand = App\Partner::all();
                        @endphp
                        @foreach ($brand as $s_brand)
                            <div class="col-xs-12">
                                <div class="single-brand">
                                    <a><img src="{{ URL::asset('upload/brand/'.$s_brand->Img_Pn)}}" alt="{{$s_brand->Img_Pn}}"></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- brand section end -->
<!-- service section start -->
<section class="re-section-padding">
    <div class="service section-padding">
        <div class="container">
            <div class="row text-center">
                <div class="col-xs-12 col-sm-4">
                    <div class="single-service">
                        <i class="pe-7s-plane"></i>
                        <h4>Giao hàng miễn phí</h4>
                        <p>Giao hàng miễn phí chỉ áp dụng hóa đơn trên <b>1.000.000 VNĐ</b>.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="single-service res-single">
                        <i class="pe-7s-headphones"></i>
                        <h4>Hỗ trợ khách hàng 24/7</h4>
                        <p>Hỗ trợ khách hàng <b>24/7</b>.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="single-service">
                        <i class="pe-7s-refresh"></i>
                        <h4>Hỗ trợ hoàn tiền</h4>
                        <p>Hoàn tiền <b>200%</b> khi phát hiện hàng giả.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- service section end -->
<!-- footer section start -->
<footer class="re-footer-section">
    <!-- footer-top area start -->
    <div class="footer-top section-padding-top">
        <div class="footer-dsc">
            <div class="container">
                <div class="row">
                    @php
                        $info = App\Info::all();
                    @endphp
                    @foreach ($info as $s_info)
                        <div class="col-xs-12 hidden-sm col-md-3">
                            <div class="single-text res-text">
                                <div class="footer-title">
                                    <h4>Về cửa hàng</h4>
                                    <hr class="dubble-border">
                                </div>
                                <div class="footer-text">
                                    <p>{{ $s_info->Content }}</p>
                                </div>
                                <div class="social-media">
                                    <div class="social-icon">
                                        <ul>
                                            <li class="res-mar"><a><i class="fa fa-facebook"></i></a></li>
                                            <li><a><i class="fa fa-twitter"></i></a></li>
                                            <li><a><i class="fa fa-google-plus"></i></a></li>
                                            <li><a><i class="fa fa-linkedin"></i></a></li>
                                            <li><a><i class="fa fa-instagram"></i></a></li>
                                            <li><a><i class="fa fa-soundcloud"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-6 margin-top">
                            <div class="single-text res-text">
                                <div class="footer-title">
                                    <h4>Địa điểm cửa hàng</h4>
                                    <hr class="dubble-border">
                                </div>
                                <div class="footer-menu">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4978.374018637153!2d106.67923887142652!3d10.811421168022925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528dfcf546de7%3A0xf872809fb8deded!2zVHLGsMahzIBuZyBDYW8gxJDEg8yJbmcgRlBUIFBvbHl0ZWNobmljIChDUzIp!5e1!3m2!1svi!2s!4v1548083705357"
                                        style="border:0;width: 100%;height: 194px;" allowfullscreen=""></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 margin-top">
                            <div class="single-text res-text">
                                <div class="footer-title">
                                    <h4>Thông tin cửa hàng</h4>
                                    <hr class="dubble-border">
                                </div>
                                <div class="footer-text">
                                    <ul>
                                        <li>
                                            <i class="pe-7s-map-marker"></i>
                                            <p style="text-align: unset;">{{ $s_info->Location_tasnm }}</p>
                                        </li>
                                        <li>
                                            <i class="pe-7s-call"></i>
                                            <p>{{ $s_info->SDT_tasnm }}</p>
                                        </li>
                                        <li>
                                            <i class="pe-7s-mail-open"></i>
                                            <p>{{ $s_info->Email_tasnm }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <hr class="dubble-border">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="footer-text">
                        <h3>Đăng ký để nhận nhiều khuyến mãi !</h3>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="footer-text">
                        <form action="" method="post">
                            @csrf
                            <input type="text" name="email" placeholder="Đăng ký nhận khuyến mãi....">
                            <input type="submit" value="Đăng ký" name="AddSale">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-top area end -->
    <!-- footer-bottom area start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <p style="font-weight:bold; letter-spacing: 5px;">© 2019 FpolyHub. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom area end -->
</footer>
<!-- footer section end -->
<!-- all js here -->
    <!-- jquery latest version -->
    <script src="../js/vendor/jquery-1.12.0.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
    <!-- bootstrap js -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- parallax js -->
    <script src="../js/parallax.min.js"></script>
    <!-- owl.carousel js -->
    <script src="../js/owl.carousel.min.js"></script>
    <!-- Img Zoom js -->
    <script src="../js/img-zoom/jquery.simpleLens.min.js"></script>
    <!-- meanmenu js -->
    <script src="../js/jquery.meanmenu.js"></script>
    <!-- jquery.countdown js -->
    <script src="../js/jquery.countdown.min.js"></script>
    <!-- Nivo slider js
        ============================================ -->
    <script src="../system/lib/js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="../system/lib/home.js" type="text/javascript"></script>
    <!-- jquery-ui js -->
    <script src="../js/jquery-ui.min.js"></script>
    <!-- sticky js -->
    <script src="../js/sticky.js"></script>
    <!-- plugins js -->
    <script src="../js/plugins.js"></script>
    <!-- main js -->
    <script src="../js/main.js"></script>
    <script>
        $(document).ready(function() {

            $('#button-review').click(function(event) {
                var name = $("#name").val();
                var email = $("#email").val();
                var mess = $("#mess").val();
                var idsp = $("#idsp").val();
                if ((name != "") && (email != "") && (mess != "") && (idsp > 0)) {
                    $.ajax({
                        url: "./model/addcmt.php",
                        type: "POST",
                        data: {
                            name: name,
                            email: email,
                            mess: mess,
                            idsp: idsp
                        },
                        success: function(comment) {
                            $("#name").val();
                            $("#email").val();
                            $("#mess").val();
                            $("#idsp").val();
                            $('#review').html(comment);
                        }
                    });
                } else {
                    $("#message").html('* Tên, Email, Tin nhắn không được để trống !!!!!');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.qty').change(function() {
                var ID_SP = $(this).attr("data-masp");
                var New_SL = $('#sl' + ID_SP).val();
                var Color = $('#color' + ID_SP).val();
                var Size = $('#size' + ID_SP).val();
                $.ajax({
                    url: "./model/action_cart.php",
                    type: "POST",
                    data: 'nsl=' + New_SL + '&idsp=' + ID_SP + '&color=' + Color + '&size=' + Size,
                    success: function(data) {
                        location.reload();
                    }
                })
            });

            $('.accept').click(function() {
                var Fullname = $('.FullName').val();
                var Email = $('.Email').val();
                var Phone = $('.Phone').val();
                var Address = $('.Address').val();
                $.ajax({
                    url: "./model/action_mail.php",
                    type: "POST",
                    data: 'fullname=' + Fullname + '&email=' + Email + '&phone=' + Phone + '&address=' + Address,
                    success: function(data) {}
                })
            });
        });
    </script>
    <script>
        $(document).ready(function(){
                $('.reset').on('click', function() {
                    $(".FullName, .UserName, .PassWord, .Phone, .Address").attr("type", "hidden");
                    $(".tb-r").text("Tìm mật khẩu");
                    $(".led, .reset, .res-1").css("display", "none");
                    $(".res-2, .register, .error-email-1").css("display", "inline-block");
                    $("#re-form").attr("action", "{{ route('password.email') }}");

                });
                $('.register').on('click', function() {
                    $(".FullName, .UserName, .PassWord, .Phone, .Address").attr("type", "text");
                    $(".tb-r").text("Đăng ký tài khoản");
                    $(".led, .reset, .res-1").css("display", "inline-block");
                    $(".res-2, .register, .error-email-1").css("display", "none");
                    $("#re-form").attr("action", "{{ url('/dangkytaikhoan') }}");
                });
        });
    </script>
