@extends('website.master')
@section('website.content')
    <!-- pages-title-start -->
    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Liên hệ</h2>
                        <p><a href="./">Trang chủ</a> | Liên hệ</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pages-title-end -->
    <!-- contact content section start -->
    <section class="top-map-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="map-area">
                        <div class="contact-map">
                            <iframe id="hastech" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.9928014459056!2d106.67772331433699!3d10.81186226149621!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528dfcf546de7%3A0xf872809fb8deded!2zVHLGsMahzIBuZyBDYW8gxJDEg8yJbmcgRlBUIFBvbHl0ZWNobmljIChDUzIp!5e0!3m2!1svi!2s!4v1558712811470!5m2!1svi!2s"
                                frameborder="0" style="border: 0px;" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="page-title">
                        <h3>Thông tin liên hệ</h3>
                    </div>
                    @php
                            $info = App\Info::all();
                    @endphp
                    @foreach ($info as $ct_info)
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-4 text-center">
                                        <strong style="padding-bottom:1em">Địa chỉ :</strong>
                                        <br>
                                        <p style="margin-top:0.5em;">{{ $ct_info->Location_tasnm }}</p>
                                    </div>
                                    <div class="col-lg-4 text-center">
                                        <strong style="padding-bottom:1em">Số điện thoại</strong>
                                        <br>
                                        <p style="margin-top:0.5em;">{{ $ct_info->SDT_tasnm }}</p>
                                        <br>
                                    </div>
                                    <div class="col-lg-4 text-center">
                                        <strong style="padding-bottom:1em">Email</strong>
                                        <br>
                                        <p style="margin-top:0.5em;">{{ $ct_info->Email_tasnm }}</p>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Liên hệ chúng tôi</h3>
                        </div>
                        <form class="cendo" action="" method="post">

                            <div class="form-group required">
                                <label class="col-md-2 control-label">Họ và Tên</label>
                                <div class="col-md-10">
                                    <input class="form-control" value="{{ Auth::user()->FullName ?? '' }}" type="text" name="FNCT" required>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-2 control-label">E-Mail</label>
                                <div class="col-md-10">
                                    <input class="form-control" value="{{ Auth::user()->email ?? '' }}" type="email" name="EMCT" required>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-2 control-label">Tiêu Đề</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="TTCT" required>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-2 control-label">Tin Nhắn</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" rows="10" name="MSCT" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="buttons">
                                    <div class="pull-right">
                                        <input class="btn btn-primary" type="submit" name="SMCT" value="Gửi">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact content section end -->
@endsection
