@extends('website.master')
@section('website.content')
    <!-- pages-title-start -->
    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Đăng nhập • Đăng ký</h2>
                        <p><a href="./">Trang chủ</a> | Đăng nhập • Đăng ký</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pages-title-end -->
    <!-- login content section start -->
    <div class="login-area">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-xs-12" style="margin: 0 25%">
                    <div class="tb-login-form ">
                        <h5 class="tb-title">Đăng nhập </h5>
                        <form method="post" action="#">
                            @csrf
                            <p class="checkout-coupon top log a-an">
                                <label class="l-contact">
                                            Tài Khoản :
                                            <em>*{{ (empty($error)) ? $errors->first('Username') : $error ?? '' }}</em>
                                        </label>
                                <input type="text" name="Username" >
                            </p>
                            <p class="checkout-coupon top-down log a-an">
                                <label class="l-contact">
                                            Mật Khẩu :
                                            <em>*{{ (empty($error)) ? $errors->first('Password') : $error ?? '' }}</em>
                                        </label>
                                <input type="password" name="Password" >
                            </p>
                            <p class="login-submit5">
                                <input name="Login" class="button-primary" type="submit" value="Đăng Nhập">
                                <input onclick="document.location.href='/dangkytaikhoan'" value="Bạn muốn tạo tài khoản ?" class="reset input-text" type="button">
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login  content section end -->
@endsection
