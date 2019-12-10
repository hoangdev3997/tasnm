@extends('website.master')
@section('website.content')
    <!-- pages-title-start -->
    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">{{$product_detail->Ten_SP}}</h2>
                        @php
                            $n_g = App\Group_SP::where('id', $product_detail->ID_Group)->first();
                        @endphp
                        <p><a href="{{url('./')}}">Trang chủ</a> | <a href="{{url('danhmuc')}}{{$product_detail->ID_Group}}">{{$n_g->Ten_Group}}</a> | {{$product_detail->Ten_SP}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pages-title-end -->
    <!-- single peoduct content section start -->
    <section class="single-product-area sit">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 none-si-pro">
                            <div class="pro-img-tab-content tab-content">
                                    <div class="pro-type">
                                            @if ($product_detail->Availability != "Hết Hàng")
                                                @if ($product_detail->Event_SP != NULL)
                                                    <span>{{ $product_detail->Event_SP }}</span>
                                                @endif
                                            @else
                                                <span>{{ $product_detail->Availability }}</span>
                                            @endif
                                    </div>
                                <div class="tab-pane active" id="image-main">
                                    <div class="simpleLens-big-image-container">
                                        <a class="simpleLens-lens-image" data-lightbox="roadtrip" data-lens-image="{{ URL::asset('upload/products/'.$product_detail->Img_SP)}}" href="{{ URL::asset('upload/products/'.$product_detail->Img_SP)}}">
                                            <img src="{{ URL::asset('upload/products/'.$product_detail->Img_SP)}}" alt="{{ $product_detail->Ten_SP }}" class="simpleLens-big-image">
                                        </a>
                                    </div>
                                </div>
                                @php
                                    $i_p_d = App\Product_pic::where('ID_SP', $product_detail->id)->get();
                                @endphp
                                @foreach ($i_p_d as $s_i_p_d)
                                <div class="tab-pane" id="image-{{$s_i_p_d->id}}">
                                        <div class="simpleLens-big-image-container">
                                            <a class="simpleLens-lens-image" data-lightbox="roadtrip" data-lens-image="{{ URL::asset('upload/products/'.$s_i_p_d->Images)}}" href="{{ URL::asset('upload/products/'.$s_i_p_d->Images)}}">
                                                <img src="{{ URL::asset('upload/products/'.$s_i_p_d->Images)}}" alt="{{ $product_detail->Ten_SP }}" class="simpleLens-big-image">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pro-img-tab-slider indicator-style2">
                                <div class="item">
                                    <a href="#image-main" data-toggle="tab"><img src="{{ URL::asset('upload/products/'.$product_detail->Img_SP)}}" alt="{{ $product_detail->Ten_SP }}" /></a>
                                </div>
                                @foreach ($i_p_d as $s_s_i_p_d)
                                    <div class="item">
                                        <a href="#image-{{$s_s_i_p_d->id}}" data-toggle="tab"><img src="{{ URL::asset('upload/products/'.$s_s_i_p_d->Images)}}" alt="{{ $product_detail->Ten_SP }}" /></a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <form action="{{ url('/giohang') }}" method="post" class="cras">
                                @csrf
                                <div class="product-name">
                                    <h2>{{ $product_detail->Ten_SP }}</h2>
                                </div>
                                <p class="availability in-stock">
                                    Mã Sản Phẩm:{{ $product_detail->id }}</p>
                                <p class="availability in-stock2">
                                    Tình trạng:{{ $product_detail->Availability }}</p>
                                <div class="short-description">
                                    <p>
                                        <p>{{ $product_detail->Mota_SP }}</p>
                                    </p>
                                </div>
                                <div class="pre-box">
                                    <span class="special-price">{{ number_format($product_detail->Gia_SP) }} VNĐ
                                        @if($product_detail->GiamGia_SP != NULL)
                                            <span> - </span> <span class="sale">{{number_format($product_detail->GiamGia_SP) }} VNĐ</span>
                                        @endif
                                    </span>
                                </div>
                                <div class="add-to-box1">
                                    <div class="add-to-box add-to-box2">
                                        <div class="add-to-cart">
                                            <div class="input-content">
                                                <label>Số Lượng:</label>
                                                <div class="quantity">
                                                    <div class="cart-plus-minus">
                                                        <input type="text" value="1" name="qty" class="cart-plus-minus-box">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-to-box add-to-box2">
                                        <div class="add-to-cart">
                                            <div class="input-content">
                                                <label>Kích thước:</label>
                                                <div class="quantity">
                                                    <select required name="Size">
                                                            <option value="">---</option>
                                                                <option value="{{$product_detail->Size_SP}}">{{$product_detail->Size_SP}}</option>
                                                            </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-to-box add-to-box2">
                                        <div class="add-to-cart">
                                            <div class="input-content">
                                                <label>Màu Sắc:</label>
                                                <div class="quantity">
                                                    <select required name="Color" >
                                                                <option value="">---</option>
                                                                <option value="{{$product_detail->Color_SP}}">{{$product_detail->Color_SP}}</option>
                                                            </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-icon">
                                        @if ($product_detail->Availability != "Hết Hàng")
                                                <input type="hidden" name="ID_SP" value="{{$product_detail->id}}">
                                                <input type="hidden" name="Ten_SP" value="{{$product_detail->Ten_SP}}">
                                                <input type="hidden" name="Gia_SP" value="{{$product_detail->Gia_SP}}">
                                                <button type="submit" name="Buy"><i class="fa fa-shopping-cart"></i></button>
                                        @else
                                                <button type="button"><i class="fa fa-sign-in" aria-hidden="true"></i></button>
                                        @endif
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="text">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Mô tả sản phẩm</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Bình luận ({{ $count_cmt ?? 0 }})</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tab-con2">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                        <p>{{ $product_detail->Mota_SP }}</p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="profile">
                                        <div class="form-horizontal">
                                            @comments(['model' => $product_detail])
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-sidebar">
                        <div class="single-sidebar an-shop">
                            <h3 class="wg-title">Sản phẩm nổi bật khác</h3>
                            <ul>
                                @foreach ($products_nb as $nb_products)
                                    <li class="b-none7">
                                        <div class="tb-recent-thumbb">
                                            <a href="{{url('sanpham')}}{{$nb_products->id}}">
                                                <img class="attachment " src="{{ URL::asset('upload/products/'.$nb_products->Img_SP)}}" alt="{{$nb_products->Ten_SP}}">
                                            </a>
                                        </div>
                                        <div class="tb-recentb7 ">
                                            <div class="tb-beg ">
                                                <a href="{{url('sanpham')}}{{$nb_products->id}}">{{$nb_products->Ten_SP}}</a>
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
            </div>
        </div>
    </section>
    <!-- single peoduct content section end -->
@endsection
