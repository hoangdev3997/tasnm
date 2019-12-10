@extends('website.master')
@section('website.content')
    <!-- pages-title-start -->
    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Giới thiệu</h2>
                        <p><a href="{{ url('./') }}">Trang chủ</a> | Giới thiệu</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pages-title-end -->
    <!-- about content section start -->
    <section class="main_shop_area">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="about-us-all">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="about-optima-img">
                                <iframe id="hastech" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.9928014459056!2d106.67772331433699!3d10.81186226149621!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528dfcf546de7%3A0xf872809fb8deded!2zVHLGsMahzIBuZyBDYW8gxJDEg8yJbmcgRlBUIFBvbHl0ZWNobmljIChDUzIp!5e0!3m2!1svi!2s!4v1558712811470!5m2!1svi!2s"
                                    frameborder="0" style="border: 0px;" allowfullscreen=""></iframe>
                            </div>
                        </div>
                        @php
                            $info = App\Info::all();
                        @endphp
                        @foreach ($info as $ab_info)
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="about-optima-text">
                                    <h1>Giới thiệu <strong>Tasnm</strong>
                                    </h1>
                                    <p>{{ $ab_info->Content }}</p>
                                    <ul>
                                        <li>{{ $ab_info->Location_tasnm }}</li>
                                        <li>{{ $ab_info->SDT_tasnm }}</li>
                                        <li>{{ $ab_info->Email_tasnm }}</li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about  content section end -->
@endsection
