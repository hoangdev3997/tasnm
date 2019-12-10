@php
    $info = App\Info::all();
@endphp
<header>
    <div class="header-top">
        <div class="container">
            <div class="row">
                @foreach ($info as $h_info)
                    <div class="col-md-6 col-sm-4">
                        <div class="left-header clearfix">
                            <ul>
                                <li>
                                    <p><i class="fa fa-phone" aria-hidden="true"></i>{{ $h_info->SDT_tasnm }}</p>
                                </li>
                                <li class="hd-none">
                                    <p><i class="fa fa-clock-o" aria-hidden="true"></i>{{ $h_info->Time_tasnm }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-6 col-sm-8">
                    <div class="right-header">
                        @if (Auth::check())
                        <ul>
                            <li><a href="taikhoan"><i class="fa fa-user"></i>{{ Auth::user()->FullName }}</a></li>
                            <li><a href="giohang"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a></li>
                            <li><a href="logout"><i class="fa fa-lock"></i>Đăng xuất</a></li>
                        </ul>
                        @else
                            <ul>
                                <li><a href="giohang"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a></li>
                                <li><a href="dangnhaptaikhoan"><i class="fa fa-lock"></i>Đăng nhập</a></li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-one" id="sticky-menu">
        <div class="container relative">
            <div class="row">
                <div class="col-sm-2 col-md-2 col-xs-4">
                    <div class="logo">
                        <a href="{{ url('./') }}"><img src="../upload/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-sm-10 col-md-10 col-xs-8 static">
                    <div class="all-manu-area">
                        <div class="mainmenu clearfix hidden-sm hidden-xs">
                            <nav>
                                <ul>
                                    <li><a class="{{ request()->is('/') ? 'active' : '' }}" href="{{ url('./') }}">Trang Chủ</a></li>
                                    <li><a class="{{ request()->is('gioithieu') ? 'active' : '' }}" href="{{ url('gioithieu') }}">Giới thiệu</a></li>
                                    <li class="drop-icon re-icon"><a href="{{ url('danhmuc') }}">Sản Phẩm <b class="caret"></b></a>
                                        <div class="magamenu ">
                                            <ul class="again">
                                                @php
                                                    $group = App\Group_sp::all();
                                                @endphp
                                                @foreach ($group as $g_group)
                                                    <li class="single-menu colmd4">
                                                        <a href="{{ url('/danhmuc') }}{{ $g_group->id }}"><span>{{ $g_group->Ten_Group}}</span></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a class="{{ request()->is('lienhe') ? 'active' : '' }}" href="{{ url('lienhe') }}">Liên hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- mobile menu start -->
                        <div class="mobile-menu-area hidden-lg hidden-md">
                            <div class="mobile-menu">
                                <nav id="dropdown" style="display: block;">
                                    <ul>
                                        <li><a href="./">Trang Chủ</a></li>
                                        <li><a href="gioithieu">Giới thiệu</a></li>
                                        <li class="drop-icon re-icon"><a href="#">Sản Phẩm</a>
                                            <ul>
                                                <li class="drop-icon re-icon"><a href="#">all products</a>
                                                    <ul>
                                                        <li>
                                                            <span>men’s wear</span>
                                                            <a href="#">shirts &amp; top</a>
                                                            <a href="#">shoes</a>
                                                            <a href="#">dresses</a>
                                                            <a href="#">shwmwear</a>
                                                            <a href="#">jeans</a>
                                                            <a href="#">sweaters</a>
                                                            <a href="#">jacket</a>
                                                        </li>
                                                        <li>
                                                            <span>women’s wear</span>
                                                            <a href="#">shirts &amp; tops</a>
                                                            <a href="#">shoes</a>
                                                            <a href="#">dresses</a>
                                                            <a href="#">shwmwear</a>
                                                            <a href="#">jeans</a>
                                                            <a href="#">sweaters</a>
                                                            <a href="#">jacket</a>
                                                        </li>
                                                        <li>
                                                            <span>accessories</span>
                                                            <a href="#">sunglasses</a>
                                                            <a href="#">leather</a>
                                                            <a href="#">belts</a>
                                                            <a href="#">rings</a>
                                                            <a href="#">sweaters</a>
                                                            <a href="#">persess</a>
                                                            <a href="#">bags</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="lienhe">Liên hệ</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- mobile menu end -->
                        <div class="right-header re-right-header">
                            <ul>
                                <li class="re-icon tnm"><i class="fa fa-search" aria-hidden="true"></i>
                                    <form method="get" id="searchform" action="/timkiem">
                                        <input type="text" name="search" id="ws" placeholder="Tìm sản phẩm.....">
                                        <button type="submit"><i class="pe-7s-search"></i></button>
                                    </form>
                                </li>
                                <li class="drop-icon re-icon"><a href="{{ url('giohang') }}"><i class="fa fa-shopping-cart"></i><span class="color1">{{ Cart::count() }}</span></a>
                                    <ul class="drop-cart" style="max-height: 30vh;">
                                        @if (Cart::content()->count() > 0)
                                            @foreach(Cart::content() as $row)
                                                <li>
                                                    @php
                                                        $s_Pro = App\Product::find($row->id);
                                                    @endphp
                                                    <a href="{{ url('giohang') }}"><img src="{{ URL::asset('upload/products/'.$s_Pro->Img_SP) }}" alt=""></a>
                                                    <div class="add-cart-text">
                                                        <p><a href="{{ url('sanpham') }}{{$s_Pro->id}}">{{ $s_Pro->Ten_SP }}</a></p>
                                                        <p>{{ number_format($row->price) }} x {{ $row->qty }} = {{ number_format($row->subtotal) }}</p>
                                                        <span style="margin-bottom:5px;margin-top: 10px;">Kích thước : {{ ($row->options->has('size') ? $row->options->size : '') }}</span>
                                                        <span>Màu sắc   : {{ ($row->options->has('color') ? $row->options->color : '') }}</span>
                                                    </div>
                                                    <div class="pro-close">
                                                        <a href="{{ url('/xoagh') }}/{{$row->rowId}}"><i class="pe-7s-close"></i></a>
                                                    </div>
                                                </li>
                                            @endforeach
                                            <li class="total-amount clearfix">
                                                <span class="floatleft">Tổng tiền :</span>
                                                <span class="floatright"><strong> {{ number_format(Cart::subtotal()) }} VNĐ</strong></span>
                                            </li>
                                            <li>
                                                <div class="goto text-center">
                                                    <a href="{{ url('giohang') }}"><strong>Giỏ hàng &nbsp;<i class="pe-7s-angle-right"></i></strong></a>
                                                </div>
                                            </li>
                                            <li class="checkout-btn text-center">
                                                <a href="{{ url('thanhtoan') }}">Thanh toán</a>
                                            </li>
                                        @else
                                            <li class="total-amount clearfix" style="text-align:center;">
                                                <span style="text-align:center;font-weight:bold;">Giỏ hàng rỗng !!!!</span>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
