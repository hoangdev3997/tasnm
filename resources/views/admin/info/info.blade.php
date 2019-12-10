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
                    <h5>Thông tin liên hệ</h5>
                    <span>Quản lý thông tin</span>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="line"></div>


        <!-- Message -->
        <!-- Main content wrapper -->
        <div class="wrapper">

            <!-- Static table -->
            <div class="widget">

                <div class="title">
                    <h6>Bảng thông tin liên hệ</h6>
                </div>

                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable taskWidget" id="checkAll">
                    <thead>
                        <tr>
                            <td style="width:21px;"><img src="{{ URL::asset('upload/icons/tableArrows.png') }}"></td>
                            <td style="width:125px;">Số điện Thoại</td>
                            <td style="width:125px;">Email</td>
                            <td style="width:250px;">Địa chỉ</td>
                            <td style="width:200px;">Giờ Hoạt Động</td>
                            <td>Nội dung</td>
                            <td style="width:80px;">Hành động</td>
                        </tr>
                    </thead>

                    <tfoot class="auto_check_pages">
                        <tr>
                            <td colspan="8">
                                <div class="list_action itemActions"></div>
                                <div class="pagination"></div>
                            </td>
                        </tr>
                    </tfoot>

                    <tbody>
                        @foreach ($info as $s_info)
                            <form action="{{route('Take_info', $s_info->id)}}" method="post" class="form" name="filter">
                                @csrf()
                                <tr class="row_18">
					                @if(isset($_POST['Edit']) && $_POST['Edit'] == $s_info->id)
                                        <td><input type="checkbox" value="{{ $s_info->id }}" name="id[]"></td>
                                        <td class="form"><input style="padding-left:0;padding-right:0;text-align:center;" value="{{ $s_info->SDT_tasnm }}" name="Edit_SDT" _autocheck="true" type="text" /></td>
                                        <td class="form"><input style="padding-left:0;padding-right:0;text-align:center;" value="{{ $s_info->Email_tasnm }}" name="Edit_Email" _autocheck="true" type="text" /></td>
                                        <td class="form"><input style="padding-left:0;padding-right:0;text-align:center;" value="{{ $s_info->Location_tasnm }}" name="Edit_Location" _autocheck="true" type="text" /></td>
                                        <td class="form"><input style="padding-left:0;padding-right:0;text-align:center;" value="{{ $s_info->Time_tasnm }}" name="Edit_Time" _autocheck="true" type="text" /></td>
                                        <td class="form">
                                            <textarea style="padding-left:0;padding-right:0;" rows="5" name="Edit_Content">
                                                {{ $s_info->Content }}
                                            </textarea>
                                        </td>
                                        <td class="option">
                                            <input type="hidden" name="Edit_id" value="{{ $s_info->id }}">
                                            <input name="Edit1" style="width: 100%;" type="submit" value="Sửa mới" class="redB" />
                                            <input type="reset" style="width: 100%; margin-top:0.5em" value="Hủy bỏ" class="basic" onClick="document.location.href='{{ url('AdmincuaKhoa/thongtin') }} '" />
                                        </td>
                                    @else
                                        <tr class="row_3">
                                            <td><input type="checkbox" name="id[]"></td>
                                            <td class="textC">
                                                <strong>{{$s_info->SDT_tasnm}}</strong>
                                            </td>
                                            <td class="textC"><strong>{{$s_info->Email_tasnm}}</strong></td>
                                            <td class="textC">
                                                {{$s_info->Location_tasnm}}
                                            </td>
                                            <td>{{$s_info->Time_tasnm}}</td>
                                            <td class="textCC ">
                                                {{$s_info->Content}}
                                            </td>
                                            <td class="option" style="width:6%;">
                                                <button type="submit" name="Edit" value="{{ $s_info->id }}" class="edit"><img src="{{ URL::asset('upload/icons/color/edit.png') }}" /></button>
                                            </td>
                                        </tr>
                                    @endif
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

