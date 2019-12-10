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
        <!-- Common -->
        <!-- Title area -->
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Danh mục nhà hợp tác</h5>
                    <span>Quản lý nhà hợp tác</span>
                </div>

                <div class="horControlB menu_action">
                    <ul>
                        <li>
                            <a class="add" href="#">
                                <img src="{{ URL::asset('upload/icons/control/16/add.png' )}}">
                                <span>Thêm mới !!!</span>
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
                    <div class="num f12">Tổng số: <b> {{$count_partner ?? 0}} </b></div>
                </div>

                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable taskWidget" id="checkAll">
                    <thead>
                        <tr>
                            <td style="width:21px;"><img src="{{ URL::asset('upload/icons/tableArrows.png' )}}"></td>
                            <td style="width:40px;">Mã số</td>
                            <td>Hình ảnh</td>
                            <td style="width:80px;">Hành động</td>
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
                        @foreach ($partner as $s_partner)
                            <form action="" method="post" enctype="multipart/form-data">
                                <tr class="row_18">
                                    <td><input type="checkbox" name="id[]" value="1"></td>
                                    <td class="textC">{{$loop->index + 1}}</td>
                                    <td class="textC">
                                        <img src="{{ URL::asset('upload/brand/'. $s_partner->Img_Pn ?? '0')}}" style="margin-bottom:5px;width:25% !important; height:auto" height="50">
                                        <div class="clear"></div>
                                        {{ $s_partner->Img_Pn ?? '0' }}
                                    </td>
                                    <td class="option">
                                        <a href="{{route('Delete_partner', $s_partner->id)}}" class="del"></a>
                                    </td>
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
                <form class="form" id="form" action="{{route('Create_partner')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                            <div class="widget">
                                <div class="title">
                                    <img src="{{ URL::asset('upload/icons/dark/add.png' )}}" class="titleIcon">
                                    <h6>Thêm Mới Thông Tin Nhà hợp tác</h6>
                                </div>
                                <ul class="tabs">
                                    <li><a href="#tab1">Thông Tin Nhà hợp tác</a></li>
                                    <li style=" border-right: unset;"><span style="font-size:10px;" class="req">* Rê Chuột Vào ? Để Xem Cách Sử Dụng Các Chức Năng</span></li>
                                </ul>
                                <div class="tab_container">
                                    <div id="tab1" class="tab_content pd0">
                                        <div class="formRow">
                                            <label class="formLeft" for="param_name"> Ảnh Nhà hợp tác :</label>
                                            <div class="formRight">
                                                <span class="oneTwo">
                                                    <input required="" style="width: 85%;" name="fileToInsert" id="param_name" _autocheck="true" type="file">
                                                    <strong class="red" style="float: right;width: 100%;margin-top:1em;"></strong>
                                                    <img class="tipS cursorP" title="Ảnh Nhà hợp tác." style="margin-left:9px;margin-bottom:-8px" src="{{ URL::asset('upload/icons/notifications/information.png' )}}">
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
