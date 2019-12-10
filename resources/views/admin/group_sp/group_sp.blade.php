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
                    <h5>Danh mục</h5>
                    <span>Quản lý thể loại</span>
                </div>
                <div class="horControlB menu_action">
                    <ul>
                        <li>
                            <a class="add" href="#">
                                <img src="{{ URL::asset('upload/icons/control/16/add.png') }}">
                                <span>Thêm mới !!!</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::asset('AdmincuaKhoa/sanpham') }}">
                                <img src="{{ URL::asset('upload/icons/control/16/list.png') }}">
                                <span>Sản phẩm</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="line"></div>
        <!-- Message -->
        <!-- Main content wrapper -->
        <div class="wrapper">
            <!-- Static table -->
            <div class="widget" id="main_content">
                <div class="title">
                    <h6>Danh sách Danh mục</h6>
                    <div class="num f12">Tổng số: <b> {{ $count_group_sp ?? 0 }} </b></div>
                </div>
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable taskWidget" id="checkAll">
                    <thead>
                        <tr>
                            <td style="width:21px;"><img src="{{ URL::asset('upload/icons/tableArrows.png') }}"></td>
                            <td style="width:40px;">Mã Số</td>
                            <td>Tên Hàng</td>
                            <td style="width:100px;"> Vị Trí</td>
                            <td style="width:80px;">Hành Động</td>
                        </tr>
                    </thead>
                    <tfoot class="auto_check_pages">
                        <tr>
                            <td colspan="6">
                                <div class="list_action itemActions">
                                </div>

                                <div class="pagination">
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($group_sp as $kq_g_sp)
                            <form action="{{route('Take_group_sp', $kq_g_sp->id)}}" method="post">
                                @csrf()
                                <tr class="row_18">
					                @if(isset($_POST['Edit']) && $_POST['Edit'] == $kq_g_sp->id)
                                        <td><input type="checkbox" name="id[]" value="{{ $kq_g_sp->id }}" /></td>
                                        <td class="textC">{{ $kq_g_sp->id }}</td>
                                        <td class="form"><input style="width: 50%; text-align:center;" value="{{ $kq_g_sp->Ten_Group }}" name="Edit_Ten_Group" id="param_name" _autocheck="true" type="text" /></td>
                                        <td class="form"><input style="width: 50%; text-align:center;" value="{{ $kq_g_sp->Top_Group }}" name="Edit_Top_Group" id="param_top" _autocheck="true" type="text" /></td>
                                        <td class="option">
                                            <input type="hidden" name="Edit_id" value="{{ $kq_g_sp->id }}">
                                            <input name="Edit1" style="width: 100%;" type="submit" value="Sửa mới" class="redB" />
                                            <input type="reset" style="width: 100%; margin-top:0.5em" value="Hủy bỏ" class="basic" onClick="document.location.href='{{ url('AdmincuaKhoa/loaisanpham') }} '" />
                                        </td>
                                    @else
                                        <td><input type="checkbox" name="id[]" value="{{ $kq_g_sp->id }}" /></td>
                                        <td class="textC">{{$loop->index + 1}}</td>
                                        <td>{{ $kq_g_sp->Ten_Group }}</td>
                                        <td>{{ $kq_g_sp->Top_Group }}</td>
                                        <td class="option">
                                            <button type="submit" name="Edit" value="{{ $kq_g_sp->id }}" class="edit"><img src="{{ URL::asset('upload/icons/color/edit.png') }}" /></button>
                                            <a href="{{route('Delete_group_sp', $kq_g_sp->id)}}" class="del"></a>
                                            <input type="hidden" name="ID_Group" value="{{ $kq_g_sp->id }}">
                                        </td>
                                    @endif
                                </tr>
                            </form>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="clear mt30"></div>
        <div id="popup-add" class="popup hide-popup">
            <div class="wrap-popup">
                <form class="form" id="form" action="{{route('Create_group_sp')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="widget">
                            <div class="title">
                                <img src="{{ URL::asset('upload/icons/dark/add.png') }}" class="titleIcon">
                                <h6>Thêm Mới Thông Tin Loại Hàng</h6>
                            </div>
                            <ul class="tabs">
                                <li><a href="#tab1">Thông Tin Loại Hàng</a></li>
                                <li style=" border-right: unset;"><span style="font-size:10px;" class="req">* Rê Chuột Vào ? Để Xem Cách Sử Dụng Các Chức Năng</span></li>
                            </ul>
                            <div class="tab_container">
                                <div id="tab1" class="tab_content pd0">
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name"> Tên Loại Hàng :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                                <input required="" style="width: 85%;" name="Ten_Group" id="param_name" _autocheck="true" type="text">
                                                <img class="tipS cursorP" title="Nhập tên loại hàng." style="margin-left:9px;margin-bottom:-8px" src="{{ URL::asset('upload/icons/notifications/information.png') }}">
                                                </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name"> Vị Trí Loại Hàng :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                                <input required="" style="width: 85%;" name="Top_Group" id="param_name" _autocheck="true" type="text">
                                                    <img class="tipS cursorP" title="Nhập vị trí." style="margin-left:9px;margin-bottom:-8px" src="{{ URL::asset('upload/icons/notifications/information.png') }}">
                                                </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formSubmit">
                                        <input name="Add" type="submit" value="Đồng ý" class="redB">
                                        <input type="reset" value="Hủy bỏ" class="basic cancel">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <div class="clear"></div>
@endsection
