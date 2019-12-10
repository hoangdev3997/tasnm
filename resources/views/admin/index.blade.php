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
                            <a href="{{ URL::asset('./') }}">
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
        <!-- Main content -->
        <!-- Title area -->
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Bảng điều khiển</h5>
                    <span>Trang quản lý hệ thống</span>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="line"></div>
        <!-- Message -->
        <!-- Main content wrapper -->
        <div class="wrapper">
            <div class="widgets">
                <!-- Stats -->
                <!-- User -->
                <div class="oneTwo">
                    <div class="widget">
                        <div class="title">
                            <img src="{{ URL::asset('upload/icons/dark/users.png') }}" class="titleIcon">
                            <h6>Thống kê dữ liệu</h6>
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="sTable myTable">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="left"><strong>Tổng số sản phẩm</strong></div>
                                        <div class="right f11"><a href="{{ URL::asset('AdmincuaKhoa/sanpham') }}">Chi tiết</a></div>
                                    </td>

                                    <td class="textC webStatsLink">
                                        {{ $count_products ?? 0 }}  </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="left"><strong>Tổng số tài khoản</strong></div>
                                        <div class="right f11"><a href="{{ URL::asset('AdmincuaKhoa/taikhoan') }}">Chi tiết</a></div>
                                    </td>

                                    <td class="textC webStatsLink">
                                        {{ $count_customer ?? 0 }}  </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="left"><strong>Tổng số liên hệ</strong></div>
                                        <div class="right f11"><a href="{{ URL::asset('AdmincuaKhoa/lienhe') }}">Chi tiết</a></div>
                                    </td>

                                    <td class="textC webStatsLink">
                                        {{ $count_contact ?? 0 }}  </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="left"><strong>Tổng số khuyến mãi</strong></div>
                                        <div class="right f11"><a href="{{ URL::asset('AdmincuaKhoa/khuyenmai') }}">Chi tiết</a></div>
                                    </td>

                                    <td class="textC webStatsLink">
                                        {{ $count_sale ?? 0 }}  </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Amount -->
                <div class="oneTwo">
                    <div class="widget">
                        <div class="title">
                            <img src="{{ URL::asset('upload/icons/dark/money.png') }}" class="titleIcon">
                            <h6>Doanh số</h6>
                        </div>
                        <table cellpadding="0" cellspacing="0" width="100%" class="sTable myTable">
                            <tbody>
                                <tr>
                                    <td class="fontB blue f13">Tổng số hóa đơn</td>
                                    <td class="textC webStatsLink red" style="width:65%;">
                                        {{ $count_order ?? 0 }} </td>

                                </tr>
                                <tr>
                                    <td class="fontB blue f13">Tổng doanh số</td>
                                    <td class="textC webStatsLink red" style="width:65%;">
                                        {{ number_format($sum_orders) ?? 0 }} VNĐ
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="clear"></div>
                <!-- Giao dich thanh cong gan day nhat -->
                <div class="widget">
                    <div class="title">
                        <h6>Danh sách Hóa đơn giao dịch</h6>
                    </div>
                    <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
                        <thead>
                            <tr>
                                <td style="width:10px;"><img src="{{ URL::asset('upload/icons/tableArrows.png') }}"></td>
                                <td style="width:40px;">Mã HĐ</td>
                                <td style="width:150px;">Tên khách hàng</td>
                                <td style="width:150px;">Số tiền</td>
                                <td style="width:100px;">Số Điện Thoại</td>
                                <td style="width:100px;">Tình Trạng</td>
                                <td>Ngày Mua</td>
                                <td style="width:55px;">Hành động</td>
                            </tr>
                        </thead>
                        <tfoot class="auto_check_pages">
                            <tr>
                                <td colspan="9">
                                </td>
                            </tr>
                        </tfoot>
                        <tbody class="list_item">
                            @foreach ($orders as $orders)
                                <tr>
                                    <td><input type="checkbox" name="id[]" value="{{ $orders->id }}"></td>
                                    <td class="textC">{{ $loop->index + 1}}</td>
                                    <td class="textC ">{{ $orders->FullName }}</td>
                                    <td class="textC red">{{ number_format($orders->Price_Order) }} đ</td>
                                    <td class="textC">{{ $orders->Phone }}</td>
                                    <td class="status textC">
                                        <span class="pending">
                                            {{($orders->Status_Order == '0') ? 'Chưa thanh toán' : 'Đã thanh toán'}}
                                        </span>
                                    </td>
                                    <td class="textC">{{ $orders->created_at }}</td>
                                    <td class="textC">
                                        <a href="{{ URL::asset('AdmincuaKhoa/hoadon') }}" class="lightbox"><img src="{{ URL::asset('upload/icons/color/view.png') }}"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="clear mt30">

        </div>
        <!-- <div id="popup-del" class="popup hide-popup">
	<div class="wrap-popup">
		<form class="form" id="form" action="#" method="post" enctype="multipart/form-data">
			<fieldset>
				<div class="widget">
					<div class="title">
						<img src="../public/upload/icons/dark/close.png" class="titleIcon" />
						<h6>Xóa Thông tin dữ liệu</h6>
					</div>
					<ul class="tabs">
						<li><a href="#tab1">* Thông tin này có thể rất quan trọng !!! </a></li>
					</ul>
					<div class="tab_container">
						<div class="tab_content pd0">
							<div class="formSubmit">
								<input name="#" style="width: 100%; margin-top:0.5em" type="submit" class="redB" value="Đồng ý">
								<input type="reset" style="width: 100%; margin-top:0.5em" value="Hủy bỏ" class="basic cancel" />
								<input type="hidden" name="ID" id="id_del">
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>     -->

@endsection
