@extends('admin.master')
@section('admin.content')
    <!-- Right side -->
    <div id="rightSide">
        <!-- Account panel top -->
        <div class="topNav">
            <div class="wrapper">
                <div class="userNav">
                    <ul>
                        <li>
                            <a href="{{ URL::asset('AdmincuaKhoa') }}">
                                <img style="margin-top:7px;" src="{{ URL::asset('upload/icons/light/home.png') }}">
                                <span>Trang chủ</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::asset('/') }}">
                                <img style="margin-top:7px;" src="{{ URL::asset('upload/icons/light/frames.png') }}">
                                <span>Bán hàng</span>
                            </a>
                        </li>
                        <!-- Logout -->
                        <li>
                            <a href="{{ URL::asset('/dangxuat') }}">
                                <img src="{{ URL::asset('upload/icons/topnav/logout.png') }}" alt="">
                                <span>Đăng xuất</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!-- Common -->
        <!-- Title area -->
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Hóa đơn đơn hàng chi tiết</h5>
                    <span>Chi tiết hóa đơn</span>
                </div>

                <div class="horControlB menu_action">
                    <ul>

                        <li>
                            <a href="?page=order">
                                <img src="{{ URL::asset('upload/icons/control/16/list.png') }}">
                                <span>Danh sách</span>
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="clear"></div>
            </div>
        </div>
        <div class="line"></div>
        <!-- Main content wrapper -->
        <div class="wrapper">
            <div class="widget">
                <div class="title">
                    <span class="titleIcon"><img src="{{ URL::asset('upload/icons/tableArrows.png') }}"></span>
                    <h6>Danh sách đơn hàng chi tiết</h6>
                    <div class="num f12">Tổng số: <b> {{ $count_odd ?? 0}} </b></div>
                </div>
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
                    <thead class="filter">
                        <tr>
                            <td colspan="11">
                                <form class="list_filter form" action="#" method="post">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td class="label" style="width:100px;"><label for="filter_id">Mã số hóa đơn</label></td>
                                                <td class="item">
                                                    <input name="Sea_ID" value="" id="filter_id" type="text" style="width:55px;">
                                                </td>
                                                <td>
                                                    <input type="submit" class="button blueB" name="S_ch" value="Tìm kiếm">
                                                    <input type="reset" class="basic" value="Reset" onclick="window.location.assign('?page=orderdetail'); ">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </td>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <td style="width:50px;">Mã số</td>
                            <td style="width:60px;">Ảnh sản phẩm</td>
                            <td> Tên sản phẩm</td>
                            <td style="width:80px;">Màu sắc</td>
                            <td style="width:80px;">Kích thước</td>
                            <td style="width:80px;">ID Hóa đơn</td>
                            <td style="width:80px;">ID Sản phẩm</td>
                            <td style="width:100px;">Số lượng</td>
                            <td style="width:55px;">Hành động</td>
                        </tr>
                    </thead>
                    <tfoot class="auto_check_pages">
                        <tr>
                            <td colspan="9">
                                <div class="list_action itemActions">

                                </div>

                                <div class="pagination">
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                    <tbody class="list_item">
                       @foreach ($order_detail as $s_order_detail)
                        <form action="" method="post">
                                <tr class="row_20">
                                    <td class="textC">{{$loop->index + 1}}</td>
                                    @php
                                        $products = App\Product::find($s_order_detail->ID_SP);
                                        echo '  <td class="textC">
                                                    <img src='.URL::asset("upload/products/$products->Img_SP").' style="margin-bottom:5px;width:80px !important; height:auto" height="50">
                                                    <div class="clear"></div>
                                                    '.$products->Ten_SP.'
                                                </td>
                                                <td class="textC">
                                                        <b>'.$products->Ten_SP.'</b><br>
                                                </td>';
                                    @endphp
                                    <td class="textC">{{$s_order_detail->Color_Od_SP}}
                                        </td>
                                    <td class="textC">
                                            {{$s_order_detail->Size_Od_SP}}</td>
                                    <td class="textC">
                                            {{$s_order_detail->ID_Order}}</td>
                                    <td class="textC">
                                        {{$s_order_detail->ID_SP}}</td>
                                    <td class="textC">{{$s_order_detail->Quantity}}</td>
                                    <td class="option">
                                        <a href="{{route('Delete_order_detail', $s_order_detail->id)}}" class="del"></a>
                                    </td>
                                </tr>
                            </form>
                       @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="clear mt30"></div>
    </div>
    <div class="clear"></div>
@endsection
