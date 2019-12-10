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
        <!-- Main content -->
        <!-- Common view -->
        <!-- Title area -->
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Danh sách thành viên</h5>
                    <span>Quản lý thành viên</span>
                </div>

                <div class="horControlB menu_action">
                    <ul>

                    </ul>
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
                    <h6>Danh sách Thành viên</h6>
                    <div class="num f12">Tổng số: <b> {{ $count_customer ?? 0 }} </b></div>
                </div>
                    <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
                        <thead>
                            <tr>
                                <td style="width:10px;"><img src="{{ URL::asset('upload/icons/tableArrows.png') }}"></td>
                                <td style="width:40px;">Mã Số</td>
                                <td>Họ và Tên</td>
                                <td>Tài Khoản</td>
                                <td>Mật Khẩu</td>
                                <td>Điện Thoại</td>
                                <td>Email</td>
                                <td>Địa chỉ</td>
                                <td style="width:100px;">Hành động</td>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td colspan="10">
                                    <div class="list_action itemActions">
                                    </div>

                                    <div class="pagination">
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($customer as $customer)
                                <form action="{{route('Take_customer', $customer->id)}}" method="post">
                                    @csrf()
                                    <tr class="row_18">
                                        @if(isset($_POST['Edit']) && $_POST['Edit'] == $customer->id)
                                            <td><input type="checkbox" name="id[]" value="{{ $customer->id }}" /></td>
                                            <td class="textC">{{ $customer->id }}</td>
                                            <td class="form"><input style="padding-left:0;padding-right:0;text-align:center;" value="{{ $customer->FullName }}" name="Edit_Name"  _autocheck="true" type="text" /></td>
                                            <td class="textC">{{ $customer->username }} </td>
                                            <td class="form"><input style="padding-left:0;padding-right:0;text-align:center;" value="{{ $customer->PassWord }}" name="Edit_PassWord"  _autocheck="true" type="text" /></td>
                                            <td class="form"><input style="padding-left:0;padding-right:0;text-align:center;" value="{{ $customer->Phone }}" name="Edit_Phone"  _autocheck="true" type="text" /></td>
                                            <td class="form"><input style="padding-left:0;padding-right:0;text-align:center;" value="{{ $customer->email }}" name="Edit_Email"  _autocheck="true" type="text" /></td>
                                            <td class="form"><textarea style="padding-left:0;padding-right:0;text-align:center;" name="Edit_Address" >{{ $customer->Address }}</textarea></td>
                                            <td class="option">
                                                <input type="hidden" name="Edit_id" value="{{ $customer->id }}">
                                                <input name="Edit1" style="width: 100%;" type="submit" value="Sửa mới" class="redB" />
                                                <input type="reset" style="width: 100%; margin-top:0.5em" value="Hủy bỏ" class="basic" onClick="document.location.href='{{ url('AdmincuaKhoa/taikhoan') }} '" />
                                            </td>
                                        @else
                                            <td><input type="checkbox" name="id[]" value="{{ $customer->id }}" /></td>
                                            <td class="textC">{{$loop->index + 1}}</td>
                                            <td class="textC"><span class="tipS">{{ $customer->FullName }}</span></td>
                                            <td class="textC">{{ $customer->username }} </td>
                                            <td class="textC">{{ $customer->password }}</td>
                                            <td class="textC">{{ $customer->Phone }}</td>
                                            <td class="textC"><span class="tipS">{{ $customer->email }}</span></td>
                                            <td class="textC">{{ $customer->Address }}</td>
                                            <td class="option">
                                                <button type="submit" name="Edit" value="{{ $customer->id }}" class="edit"><img src="{{ URL::asset('upload/icons/color/edit.png') }}" /></button>
                                                <a href="{{route('Delete_customer', $customer->id)}}" class="del"></a>
                                                <input type="hidden" name="ID_User" value="{{ $customer->id }}">
                                            </td>
                                        @endif
                                    </tr>
                                </form>
                            @endforeach
                            <!-- Filter -->
                        </tbody>
                    </table>
            </div>
        </div>
        <div class="clear mt30"></div>
    </div>
    <div class="clear"></div>
@endsection
