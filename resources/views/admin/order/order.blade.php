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
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Đơn hàng hóa đơn</h5>
                    <span>Quản lý các hóa đơn của khách hàng</span>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="line"></div>
        <!-- Message -->
        <!-- Main content wrapper -->
        <div class="wrapper">

            <div class="widget">
                <div class="title">
                    <h6>Danh sách Giao dịch</h6>
                    <div class="num f12">Tổng số:
                        <b>  {{ $count_od ?? 0}} </b></div>
                </div>
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
                    <thead>
                        <tr>
                            <td style="width:10px;"><img src="{{ URL::asset('upload/icons/tableArrows.png') }}"></td>
                            <td style="width:65px;">ID Hóa đơn</td>
                            <td style="width:95px;">Tên Khách hàng</td>
                            <td style="width:75px;">Số điện thoại</td>
                            <td style="width:80px;">Email</td>
                            <td>Địa chỉ</td>
                            <td style="width:70px;">Trạng Thái</td>
                            <td style="width:100px;">Ngày mua</td>
                            <td style="width:100px;">Tổng tiền</td>
                            <td style="width:55px;">Hành động</td>
                        </tr>
                    </thead>
                    <tbody class="list_item">
                        @foreach ($order as $s_order)
                            <form action="{{route('Take_order', $s_order->id)}}" method="post">
                                @csrf
                                {{-- onclick="window.location='?page=orderdetail&amp;act=10'" --}}
                                <tr style="cursor: pointer;" class="row_21" >
                                    @if(isset($_POST['Edit']) && $_POST['Edit'] == $s_order->id)
                                        <td><input type="checkbox" name="id[]" value="{{$s_order->id}}"></td>
                                        <td class="textC">{{$loop->index + 1}}</td>
                                        <td class="textC">{{$s_order->FullName}}</td>
                                        <td class="form"><input style="padding: 7px 0;text-align:center;" value="{{$s_order->Phone}}" name="Edit_Phone" _autocheck="true" type="text" /></td>
                                        <td class="textC">{{$s_order->Email}}</td>
                                        <td class="form"><input style="padding: 7px 0;text-align:center;" value="{{$s_order->Address}}" name="Edit_Address" _autocheck="true" type="text" /></td>
                                        <td class="form">
                                            <select name="Edit_Status_Order">
                                                @if ($s_order->Status_Order == '0')
                                                    <option value="0">Chưa thanh toán</option>
                                                    <option value="1">Đã thanh toán</option>
                                                @else
                                                    <option value="1">Đã thanh toán</option>
                                                    <option value="0">Chưa thanh toán</option>
                                                @endif
                                            </select>
                                        </td>
                                        <td class="textC">{{$s_order->created_at}}</td>
                                        <td class="form"><input style="padding: 7px 0;text-align:center;" value="{{$s_order->Price_Order}}" name="Edit_Price_Order" _autocheck="true" type="text" /></td>
                                        <td class="option">
                                            <input type="hidden" name="Edit_id" value="{{ $s_order->id }}">
                                            <input name="Edit1" style="width: 100%;" type="submit" value="Sửa mới" class="redB" />
                                            <input type="reset" style="width: 100%; margin-top:0.5em" value="Hủy bỏ" class="basic" onClick="document.location.href='{{ url('AdmincuaKhoa/hoadon') }} '" />
                                        </td>
                                    @else
                                        <td><input type="checkbox" name="id[]" value="{{$s_order->id}}"></td>
                                        <td class="textC">{{$loop->index + 1}}</td>
                                        <td class="textC">{{$s_order->FullName}}</td>
                                        <td class="textC">{{$s_order->Phone}}</td>
                                        <td class="textC">{{$s_order->Email}}</td>
                                        <td class="textC">{{$s_order->Address}}</td>
                                        <td class="status textC">
                                            <span class="pending">{{($s_order->Status_Order == '0') ? 'Chưa thanh toán' : 'Đã thanh toán'}}</span>
                                        </td>
                                        <td class="textC">{{$s_order->created_at}}</td>
                                        <td class="textC">{{ number_format($s_order->Price_Order) }}đ</td>
                                         <td class="option">
                                            <button type="submit" name="Edit" value="{{ $s_order->id }}" class="edit"><img src="{{ URL::asset('upload/icons/color/edit.png') }}" /></button>
                                            <a href="{{route('Delete_order', $s_order->id)}}" class="del"></a>
                                            <input type="hidden" name="ID" value="{{ $s_order->id }}">
                                        </td>
                                    @endif
                                </tr>
                            </form>
                        @endforeach
                    </tbody>
                    <tfoot class="auto_check_pages">
                        <tr>
                            <td colspan="10">
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="clear mt30"></div>
    </div>
    <div class="clear"></div>
@endsection
