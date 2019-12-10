@extends('website.master')
@section('website.content')
    <!-- pages-title-start -->
    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Thanh toán đơn hàng</h2>
                        <p><a href="{{ url('./') }}">Trang chủ</a> | Thanh toán đơn hàng</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pages-title-end -->
    <!-- checkout content section start -->
    <div class="checkout-area">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    <div class="text">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            @if (!isset($_POST['accept-checkout']))
                                <li role="presentation" class="active ano complete">
                                    <a></a>
                                    <span>Thông tin khách hàng</span>
                                </li>
                                <li role="presentation" class="ano la">
                                    <a></a>
                                    <span>Thành Công</span>
                                </li>
                            @else
                                <li role="presentation" class="ano complete">
                                    <a></a>
                                    <span>Thông tin khách hàng</span>
                                </li>
                                <li role="presentation" class="active ano la">
                                    <a></a>
                                    <span>Thành Công</span>
                                </li>
                            @endif
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            @if (!isset($_POST['accept-checkout']))
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="row">
                                        <form action="{{ route('re-checkOut') }}" method="POST">
                                            @csrf
                                            <div class="checkbox-form">
                                                <div class="col-md-12">
                                                    <h3 class="checkbox9">Thông tin khách hàng</h3>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="di-na bs">
                                                        <label class="l-contact">
                                                            Họ và Tên
                                                            <em>*</em>
                                                            </label>
                                                        <input class="form-control FullName" value="{{ Auth::user()->FullName ?? '' }}" type="text" required="" name="FullName" placeholder="Vui lòng nhập Họ và Tên">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="di-na bs">
                                                        <label class="l-contact">
                                                            Email
                                                            <em>*</em>
                                                            </label>
                                                        <input class="form-control Email" value="{{ Auth::user()->email ?? '' }}" type="email" required="" name="Email" placeholder="Vui lòng nhập Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="di-na bs">
                                                        <label class="l-contact">
                                                            Số điện thoại
                                                            <em>*</em>
                                                            </label>
                                                        <input class="form-control Phone" value="{{ Auth::user()->Phone ?? '' }}" type="tel" required="" name="Phone" placeholder="Vui lòng nhập Sô điện thoại">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="l-contact">
                                                            Địa chỉ
                                                            <em>*</em>
                                                        </label>
                                                    <div class="di-na bs">
                                                        <input class="form-control Address" value="{{ Auth::user()->Address ?? '' }}" type="text" required="" name="Address" placeholder="Vui lòng nhập địa chỉ giao hàng">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="checkout-coupon">
                                                            <input type="submit" value="<<< Mua Tiếp" onclick="document.location.href='./'">
                                                            <input type="submit" value="Thanh Toán >>>" style="float: right;" class="accept" name="accept-checkout">
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <div role="tabpanel" class="tab-pane active" id="message">
                                    <div class="last-check">
                                        <h3 class="checkbox9">Đặt hàng thành công</h3>
                                        <p> Đã gửi đơn hàng !!!</p>
                                        <div class="row">
                                            <div class="wc-proceed-to-checkout">
                                                <p style="text-align:center">
                                                    <a class="button wc-backward" href="{{ url('./') }}"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Trở về Trang Chủ</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    @if (Cart::content()->count() > 0)
                        <div class="ro-checkout-summary">
                            <div class="ro-title">
                                <h3 class="checkbox9">Giỏ Hàng</h3>
                            </div>
                            <div class="ro-body">
                                @foreach(Cart::content() as $row)
                                    <div class="ro-item">
                                        @php
                                            $s_c_p = App\Product::find($row->id);
                                        @endphp
                                        <div class="ro-image">
                                            <a href="{{ url('sanpham') }}{{$s_c_p->id}}">
                                                <img src="{{URL::asset('upload/products/'.$s_c_p->Img_SP)}}" alt="{{$s_c_p->Img_SP}}">
                                            </a>
                                        </div>
                                        <div>
                                            <div class="tb-beg">
                                                <a href="{{ url('sanpham') }}{{$s_c_p->id}}">{{$s_c_p->Ten_SP}}</a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="ro-price">
                                                <span class="amount">{{ number_format($row->price) }}</span>
                                                <div class="ro-quantity">
                                                    <strong class="product-quantity">× {{ $row->qty }} =</strong>
                                                </div>
                                            </div>
                                            <div class="product-total">
                                                <span class="amount">{{ number_format($row->subtotal) }} VNĐ</span>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="ro-price"><span>Kích thước :</span></div>
                                            <div class="product-total">
                                                <span class="amount">{{ ($row->options->has('size') ? $row->options->size : '') }}</span>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="ro-price"><span>Màu Sắc :</span></div>
                                            <div class="product-total">
                                                <span class="amount">{{ ($row->options->has('color') ? $row->options->color : '') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="ro-footer">
                                <div class="order-total">
                                    <div class="ro-divide"></div>
                                    <p> Tổng hóa đơn :<span><strong><span class="amount">{{ number_format(Cart::subtotal()) }} VNĐ</span></strong>
                                        </span>
                                    </p>
                                    <div class="ro-divide"></div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="ro-checkout-summary">
                            <div class="ro-title">
                                <h3 class="checkbox9">Giỏ Hàng</h3>
                            </div>
                            <div class="ro-footer">
                                <div class="order-total">
                                    <div class="ro-divide"></div>
                                        <p> Tổng hóa đơn <span><strong><span class="amount"> Giỏ Hàng Rỗng</span></strong></span></p>
                                    <div class="ro-divide"></div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- checkout  content section end -->
@endsection
