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
                    <div class="tb-login-form res">
                        <h5 class="tb-title"><span class="tb-r">Đăng ký tài khoản</span>
                            @error('email')<sup class="error-email-1" style="top: 0.25em; display:none"> * {{ $message }} </sup>@enderror
                            @if (session('status') )
                                <sup class="error-email-2" style="top: 0.25em; color: #00e026; display:inline-block" > * {{ session('status') }} </sup>
                            @endif
                        </h5>
                        <form id="re-form" method="post" action="{{ url('/dangkytaikhoan') }}">
                            @csrf
                                <p class="checkout-coupon top log a-an led">
                                    <label class="l-contact">
                                                Họ và Tên :
                                                <em>*  @error('FullName') {{ $message }} @enderror</em>
                                            </label>
                                    <input type="text" name="FullName" class="FullName" value="{{ old('FullName') }}" >
                                </p>
                                <p class="checkout-coupon top log a-an led">
                                    <label class="l-contact">
                                                Tài khoản :
                                                <em>*  @error('UserName') {{ $message }} @enderror</em>
                                            </label>
                                    <input type="text" name="UserName" class="UserName" value="{{ old('UserName') }}" >
                                </p>
                                <p class="checkout-coupon top log a-an led" style="width: 49.5%;margin-right: 5px;">
                                    <label class="l-contact">
                                                Mật khẩu :
                                                <em>*  @error('PassWord') {{ $message }} @enderror</em>
                                            </label>
                                    <input type="password" name="PassWord" class="PassWord">
                                </p>
                                <p class="checkout-coupon top log a-an led" style="width: 49.5%;">
                                    <label class="l-contact">
                                                Nhập lại mật khẩu :
                                                <em>*  @error('Re-PassWord') {{ $message }} @enderror</em>
                                            </label>
                                    <input type="password" name="Re-PassWord" class="PassWord">
                                </p>
                                <p class="checkout-coupon top log a-an led">
                                    <label class="l-contact">
                                                Số điện thoại :
                                                <em>*  @error('Phone') {{ $message }} @enderror</em>
                                            </label>
                                    <input type="text" name="Phone" class="Phone" value="{{ old('Phone') }}" >
                                </p>
                                <p class="checkout-coupon top log a-an led">
                                    <label class="l-contact">
                                                Địa chỉ :
                                                <em>* @error('Address') {{ $message }} @enderror</em>
                                            </label>
                                    <input type="text" name="Address" class="Address" value="{{ old('Address') }}" >
                                </p>
                                <p class="checkout-coupon top log a-an">
                                    <label class="l-contact">
                                                Email :
                                            <em class="fix-error">* @error('email') {{ $message }} @enderror</em>
                                            </label>
                                    <input type="email" name="email" value="{{ old('email') }}" >
                                </p>
                                <p class="login-submit5 ress">
                                    <input name="Sign" value="Đăng ký" class="res-1 button-primary" type="submit">
                                    <input value="Bạn đã quên tài khoản ?" class="reset input-text" type="button">

                                    <input name="Reset" value="Tạo lại mật khẩu" class="res-2 button-primary" type="submit" style="display:none">
                                    <input value="Bạn muốn tạo tài khoản ?" class="register reset input-text" type="button" style="display:none">
                                    <input onclick="document.location.href='/dangnhaptaikhoan'" value="Bạn đã có tài khoản ?" class="reset input-text" type="button">
                                </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login  content section end -->
@endsection
