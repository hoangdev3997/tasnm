@extends('website.master')
@section('website.content')
    <!-- pages-title-start -->
    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Giỏ Hàng</h2>
                        <p><a href="{{ url('./') }}">Trang chủ</a> | Giỏ hàng</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pages-title-end -->
    <!-- shopping-cart content section start -->
    @if (Cart::content()->count() > 0)
        <div class="shopping-cart-area s-cart-area">
            <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="s-cart-all">
                                <div class="cart-form table-responsive">
                                    <table id="shopping-cart-table" class="data-table cart-table">
                                        <tbody>
                                            <tr>
                                                <th class="low1">Sản phẩm</th>
                                                <th class="low7">Kích thước</th>
                                                <th class="low7">Màu sắc</th>
                                                <th class="low7">Số lượng</th>
                                                <th class="low7">Giá tiền (VNĐ)</th>
                                            </tr>
                                        @foreach(Cart::content() as $row)
                                        <form action="{{ route('up_cart') }}" method="post">
                                                @csrf
                                            <tr>
                                                <input type="hidden" name="rowId" value="{{$row->rowId}}">
                                                <input type="hidden" name="ID_SP" value="{{$row->id}}">
                                                <input type="hidden" name="Ten_SP" value="{{$row->name}}">
                                                <input type="hidden" name="Gia_SP" value="{{$row->price}}">
                                                @php
                                                    $Pro = App\Product::find($row->id);
                                                    echo '<td class="sop-cart an-shop-cart">
                                                            <a href="'.url('sanpham').''.$Pro->id.'"><img class="primary-image" alt="" src='.URL::asset('upload/products/'.$Pro->Img_SP).'></a>
                                                            <a href="'.url('sanpham').''.$Pro->id.'" style="display: inline-grid;">'.$Pro->Ten_SP.'<span> x '.number_format($row->price).'</span> </a>
                                                        </td>';
                                                @endphp
                                                <td class="sop-cart">
                                                    <div class="ray">
                                                        <select name="Size" style="width: auto;" class="input-text qty text" id="size1">
                                                            @if ($row->options->size != NULL)
                                                                <option value="{{ ($row->options->has('size') ? $row->options->size : '') }}">{{ ($row->options->has('size') ? $row->options->size : '') }}</option>
                                                            @else
                                                                <option value="">-----</option>
                                                                <option value="{{ $Pro->Size_SP }}">{{ $Pro->Size_SP }}</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </td>
                                                <td class="sop-cart">
                                                    <div class="ray">
                                                        <select name="Color" style="width: auto !important;" class="input-text qty text" id="color1">
                                                            @if ($row->options->color != NULL)
                                                                <option value="{{ ($row->options->has('color') ? $row->options->color : '') }}">{{ ($row->options->has('color') ? $row->options->color : '') }}</option>
                                                            @else
                                                                <option value="">-----</option>
                                                                <option value="{{ $Pro->Color_SP }}">{{ $Pro->Color_SP }}</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </td>
                                                <td class="sop-cart an-sh">
                                                    <div class="quantity ray">
                                                        <input class="input-text qty text" name="qty" type="number" value="{{ $row->qty }}" min="0">
                                                        <button type="submit" class="button " style="    background: #dfdfdf none repeat scroll 0 0 padding-box;
                                                        display: inline-block;
                                                        font-size: 14px;
                                                        font-weight: 600;
                                                        position: relative;
                                                        text-align: center;
                                                        padding: 6px 16px 6px;
                                                        margin-left: 5px;
                                                        border: none;">o</button>
                                                        <a class="remove" href="{{ url('/xoagh') }}/{{$row->rowId}}">
                                                            <span>x</span>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="cen">
                                                    <span class="amount">{{ number_format($row->subtotal) }}</span>
                                                </td>
                                            </tr>
                                        </form>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="last-check1">
                                    <div class="yith-wcwl-share yit">
                                        <div class="checkout-coupon an-cop">
                                            <span id="err_shop"> * Nhập đầy đủ thông tin sản phẩm trước khi thanh toán.</span>
                                            <div class="col-md-5 col-sm-12 col-xs-12 pull-right">
                                                <div class="sub-total">
                                                    <table>
                                                        <tbody>
                                                            <tr class="order-total">
                                                                <th>Tổng Tiền (VNĐ):</th>
                                                                <td style="text-align:center;">
                                                                    <strong>
                                                                        <span>{{ number_format(Cart::subtotal()) }}</span>
                                                                    </strong>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="second-all-class">
                            <div class="wc-proceed-to-checkout">
                                <p class="return-to-shop">
                                    <a class="button wc-backward" href="{{ url('./') }}"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Tiếp tục mua hàng</a>
                                </p>
                                <p class="wc-forward">
                                    <button onclick="document.location.href='/thanhtoan'" class="button wc-forward">Thanh Toán <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                                </p>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    @else
        <div class="shopping-cart-area s-cart-area">
            <div class="container">
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="s-cart-all">
                                <div class="cart-form table-responsive">
                                    <table id="shopping-cart-table" style="border: 1px solid #d4d4d4;" class="data-table cart-table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h1 style=" padding:30px 0; margin:0; color:red"> !!! Giỏ Hàng Chưa Có Sản Phẩm !!! </h1>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="last-check1">
                                    <div class="yith-wcwl-share yit">
                                        <div class="checkout-coupon an-cop">
                                            <div class="col-md-5 col-sm-12 col-xs-12 pull-right">
                                                <div class="sub-total">
                                                    <table>
                                                        <tbody>
                                                            <tr class="order-total">
                                                                <th>Tổng Tiền (VNĐ):</th>
                                                                <td>
                                                                    <strong>
                                                                        <span style="padding-left: 40px;color:red;">Giỏ Hàng Rỗng</span>
                                                                    </strong>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="second-all-class">
                            <div class="wc-proceed-to-checkout">
                                <p class="return-to-shop">
                                    <a class="button wc-backward" href="{{ url('./') }}"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Trở về Trang Chủ</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
    <!-- shopping-cart  content section end -->
@endsection
