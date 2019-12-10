@extends('website.master')
@section('website.content')
    <section class="slider-main-area">
        <div class="main-slider an-si">
            <div class="bend niceties preview-2 hm-ver-1">
                <div id="ensign-nivoslider-2" class="slides">
                    @foreach ($slide as $p_slide)
                        <img src="{{ URL::asset('upload/slider/'.$p_slide->Img_Sl)}}" alt="{{$p_slide->Img_Sl}}" title="#slider-direction-{{$loop->index + 1}}">
                    @endforeach
                </div>
                <div class="nivo-controlNav">
                    <a class="nivo-control active" rel="0">1</a>
                    @foreach ($slide as $n_slide)
                        <a class="nivo-control" rel="{{$loop->index + 1}}">{{$n_slide->id}}</a>
                    @endforeach
                </div>
                @foreach ($slide as $S_slide)
                    <div id="slider-direction-{{$loop->index + 1}}" class="t-cn slider-direction Builder">
                        <div class="slide-all">
                            <div class="layer-1">
                                <h2 class="title5">{{$S_slide->Tieude_NB }}</h2>
                            </div>
                            <div class="layer-2">
                                <h2 class="title6">{{$S_slide->Name_Sl }}</h2>
                            </div>
                            <div class="layer-2">
                                <p class="title0">{{$S_slide->NoiDung_Sl }}</p>
                            </div>
                            <div class="layer-3">
                                <a class="min1" href="{{ url('/danhmuc') }}{{$S_slide->ID_Group}}">Xem Ngay</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- new-products section start -->
    <section class="new-products single-products section-padding-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section-title">
                        <h3>Sản phẩm nổi bật</h3>
                        <div class="section-icon">
                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="new-products" class="owl-carousel product-slider owl-theme">
                    @foreach ($e_product as $s_e_product)
                        <div class="col-xs-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <div class="pro-type">
                                        @if ($s_e_product->Availability != "Hết Hàng")
                                            <span>{{ $s_e_product->Event_SP }}</span>
                                        @else
                                            <span>{{ $s_e_product->Availability }}</span>
                                        @endif
                                    </div>
                                    <a href="{{ url('sanpham') }}{{$s_e_product->id}}">
                                        <img src="{{ URL::asset('upload/products/'.$s_e_product->Img_SP)}}" alt="{{ $s_e_product->Ten_SP }}">
                                        <img class="secondary-image" alt="{{ $s_e_product->Ten_SP }}" src="{{ URL::asset('upload/products/'.$s_e_product->Img_SP)}}">
                                    </a>
                                </div>
                                <div class="product-dsc">
                                    <h3><a href="{{ url('sanpham') }}{{$s_e_product->id}}">{{ $s_e_product->Ten_SP }}</a></h3>
                                    <span>{{ number_format($s_e_product->Gia_SP) }} VNĐ</span>
                                    @if($s_e_product->GiamGia_SP != NULL)
                                        <span> - </span><span class="sale">{{number_format($s_e_product->GiamGia_SP) }} VNĐ</span>
                                    @endif
                                </div>
                                <form action="#" method="post" class="actions-btn">
                                    <a href="{{ url('sanpham') }}{{$s_e_product->id}}" data-original-title="" title=""><i class="fa fa-eye"></i></a>
                                    @if ($s_e_product->Availability != "Hết Hàng")
                                        <button type="submit" name="Buy"><i class="fa fa-shopping-cart"></i></button>
                                    @else
                                        <button type="button"><i class="fa fa-sign-in" aria-hidden="true"></i></button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- new-products section end -->
    <!-- new-products section start -->
    <section class="featured-products single-products section-padding-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section-title">
                        <h3>Danh mục sản phẩm</h3>
                        <div class="section-icon">
                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="product-tab nav nav-tabs">
                        <ul>
                            <li class="active"><a data-toggle="tab" href="#all">Tất cả</a></li>
                            @foreach ($group_sp as $s_group_sp)
                                <li><a data-toggle="tab" href="#g_product_{{$s_group_sp->id}}">{{$s_group_sp->Ten_Group}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row tab-content">
                <div class="tab-pane fade in active" id="all">
                    <div id="tab-carousel-1" class="re-owl-carousel owl-carousel product-slider owl-theme">
                        @foreach ($product as $s_product)
                            <div class="col-xs-12">
                                <div class="single-product margin-bottom">
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
                                    <form action="#" method="post" class="actions-btn">
                                        <a href="{{ url('sanpham') }}{{$s_product->id}}" data-original-title="" title=""><i class="fa fa-eye"></i></a>
                                        @if ($s_product->Availability != "Hết Hàng")
                                            <button type="submit" name="Buy"><i class="fa fa-shopping-cart"></i></button>
                                        @else
                                            <button type="button"><i class="fa fa-sign-in" aria-hidden="true"></i></button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- all shop product end -->

               @foreach ($group_sp as $s_group_sp)
                    <div class="tab-pane fade in" id="g_product_{{$s_group_sp->id}}">
                        <div id="tab-carousel-{{$loop->index + 1 }}" class="owl-carousel product-slider owl-theme">
                            @foreach ($products as $s_products)
                                @if($s_group_sp->id==$s_products->ID_Group)
                                    <div class="col-xs-12">
                                        <div class="single-product margin-bottom">
                                            <div class="product-img">
                                                <div class="pro-type">
                                                    @if ($s_products->Availability != "Hết Hàng")
                                                        @if ($s_products->Event_SP != NULL)
                                                            <span>{{ $s_products->Event_SP }}</span>
                                                        @endif
                                                    @else
                                                        <span>{{ $s_products->Availability }}</span>
                                                    @endif
                                                </div>
                                                <a href="{{ url('sanpham') }}{{$s_products->id}}">
                                                    <img src="{{ URL::asset('upload/products/'.$s_products->Img_SP)}}" alt="{{ $s_products->Ten_SP }}">
                                                    <img class="secondary-image" alt="{{ $s_products->Ten_SP }}" src="{{ URL::asset('upload/products/'.$s_products->Img_SP)}}">
                                                </a>
                                            </div>
                                            <div class="product-dsc">
                                                <h3><a href="{{ url('sanpham') }}{{$s_products->id}}">{{ $s_products->Ten_SP }}</a></h3>
                                                <span>{{ number_format($s_products->Gia_SP) }} VNĐ</span>
                                                @if($s_products->GiamGia_SP != NULL)
                                                    <span> - </span><span class="sale">{{number_format($s_products->GiamGia_SP) }} VNĐ</span>
                                                @endif
                                            </div>
                                            <form action="#" method="post" class="actions-btn">
                                                <a href="{{ url('sanpham') }}{{$s_products->id}}" data-original-title="" title=""><i class="fa fa-eye"></i></a>
                                                @if ($s_products->Availability != "Hết Hàng")
                                                    <button type="submit" name="Buy"><i class="fa fa-shopping-cart"></i></button>
                                                @else
                                                    <button type="button"><i class="fa fa-sign-in" aria-hidden="true"></i></button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- new-products section end -->
@endsection
