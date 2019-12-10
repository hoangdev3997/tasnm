@extends('website.master')
@section('website.content')
    <!-- pages-title-start -->
    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Danh mục sản phẩm</h2>
                        <p><a href="{{url('./')}}">Trang chủ</a> | Danh mục sản phẩm</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pages-title-end -->
    <!-- shop-style content section start -->
    <section class="pages products-page section-padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-3 col-sm-12">
                    <div class="all-shop-sidebar">
                        <div class="top-shop-sidebar">
                            <h3 class="wg-title">Danh Sách Sản Phẩm</h3>
                        </div>
                        <div class="shop-one">
                            <h3 class="wg-title2">Kích cỡ</h3>
                            <ul class="product-categories">
                                @foreach ($size_pr as $size_pr)
                                    <li class="cat-item">
                                        <a href="{{ url('danhmuc') }}/sapxep={{ $size_pr->Size_SP }}">{{ $size_pr->Size_SP }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="shop-one re-shop-one">
                            <h3 class="wg-title2">Màu sắc</h3>
                            <ul class="product-categories">
                                @foreach ($color_pr as $color_pr)
                                    <li class="cat-item cat-item-11">
                                        <a href="{{ url('danhmuc') }}/sapxep={{ $color_pr->Color_SP }}">{{ $color_pr->Color_SP }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="top-shop-sidebar an-shop">
                            <h3 class="wg-title">Sản phẩm nổi bật</h3>
                            <ul>
                                @foreach ($products_nb as $nb_products)
                                    <li class="b-none">
                                        <div class="tb-recent-thumbb">
                                            <a href="{{ url('sanpham') }}{{$nb_products->id}}">
                                                <img class="attachment " src="{{ URL::asset('upload/products/'.$nb_products->Img_SP)}}" alt="{{$nb_products->Ten_SP}}">
                                            </a>
                                        </div>
                                        <div class="tb-recentb7 ">
                                            <div class="tb-beg ">
                                                <a href="{{ url('sanpham') }}{{$nb_products->id}}">{{$nb_products->Ten_SP}}</a>
                                            </div>
                                            <div class="tb-product-price font-noraure-3">
                                                <span class="amount">{{number_format($nb_products->Gia_SP)}} VNĐ
                                                    @if($nb_products->GiamGia_SP != NULL)<span class="sale"><br>{{number_format($nb_products->GiamGia_SP)}} VNĐ</span>@endif
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-9 col-sm-12 ">
                    <div class="row ">
                        <div class="col-md-12 col-sm-12 col-xs-12 ">
                            <div class="features-tab ">
                                <!-- Nav tabs -->
                                <div class="shop-all-tab ">
                                    <div class="re-shop ">
                                        <div class="shop6 ">
                                            <label>Lọc theo :</label>
                                            <select onchange="location.href=this.value">
                                                <option value=" ">----- Sắp xếp -----</option>
                                                <option value="{{ url('danhmuc') }}">Mặc định</option>
                                                <option value="{{ url('danhmuc') }}/sapxep=giatangdan">Giá tăng dần</option>
                                                <option value="{{ url('danhmuc') }}/sapxep=giagiamdan">Giá giảm dần</option>
                                                @foreach ($event_pr as $event_pr)
                                                    @if ($event_pr->Event_SP != NULL)
                                                        <option value="{{ url('danhmuc') }}/sapxep={{ $event_pr->Event_SP }}">{{ $event_pr->Event_SP }}</option>
                                                    @endif
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tab panes -->
                                <div class="tab-content ">
                                    <div role="tabpanel " class="tab-pane active " id="home ">
                                        <div class="row ">
                                            <div class="shop-tab ">
                                                @foreach ($product as $s_product)
                                                    <!-- single-product start -->
                                                        <div class="col-md-4 col-lg-4 col-sm-6 " style="margin-bottom: 10px;">
                                                            <div class="single-product">
                                                                <div class="product-img">
                                                                    <div class="pro-type">
                                                                        @if ($s_product->Availability != "Hết Hàng")
                                                                            @if ($s_product->Event_SP != NULL)
                                                                                <span>{{ $s_product->Event_SP }}</span>
                                                                            @endif
                                                                        @else
                                                                            <span>{{ $s_product->Availability }}</span>
                                                                        @endif
                                                                    </div>
                                                                    <a href="{{ url('sanpham') }}{{$s_product->id}}">
                                                                        <img src="{{ URL::asset('upload/products/'.$s_product->Img_SP)}}" alt="{{ $s_product->Ten_SP }}">
                                                                        <img class="secondary-image" alt="{{ $s_product->Ten_SP }}" src="{{ URL::asset('upload/products/'.$s_product->Img_SP)}}">
                                                                    </a>
                                                                </div>
                                                                <div class="product-dsc">
                                                                    <h3><a href="{{ url('sanpham') }}{{$s_product->id}}">{{ $s_product->Ten_SP }}</a></h3>
                                                                    <span>{{ number_format($s_product->Gia_SP) }} VNĐ</span>
                                                                    @if($s_product->GiamGia_SP != NULL)
                                                                        <span> - </span><span class="sale">{{number_format($s_product->GiamGia_SP) }} VNĐ</span>
                                                                    @endif
                                                                </div>
                                                                {{-- <form action="{{ url('/giohang') }}" method="post" class="actions-btn">
                                                                    @csrf
                                                                    <a href="{{ url('sanpham') }}{{$s_product->id}}" data-original-title="" title=""><i class="fa fa-eye"></i></a>
                                                                     @if ($s_product->Availability != "Hết Hàng")
                                                                        <input type="hidden" name="ID_SP" value="{{$s_product->id}}">
                                                                        <input type="hidden" name="Ten_SP" value="{{$s_product->Ten_SP}}">
                                                                        <input type="hidden" name="Gia_SP" value="{{$s_product->Gia_SP}}">
                                                                        <input type="hidden" name="qty" value="1">
                                                                        <button type="submit" name="Buy"><i class="fa fa-shopping-cart"></i></button>
                                                                    @else
                                                                        <button type="button"><i class="fa fa-sign-in" aria-hidden="true"></i></button>
                                                                    @endif
                                                                </form> --}}
                                                            </div>
                                                        </div>
                                                    <!-- single-product end -->
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div style="display: table;margin: 0 auto;">
                                        {{ $product->links() }}
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-style  content section end -->
@endsection
