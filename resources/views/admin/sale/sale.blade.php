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
                    <h5>Khuyến mãi</h5>
                    <span>Quản lý khuyến mãi</span>
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
                    <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck"></span>
                    <h6>Danh sách Phản hồi</h6>
                    <div class="num f12"><b> {{ $count_sale ?? 0 }} </b> Phản hồi</div>
                </div>
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable taskWidget" id="checkAll">
                    <thead>
                        <tr>
                            <td style="width:21px;"><img src="{{ URL::asset('upload/icons/tableArrows.png ')}}"></td>
                            <td style="width:50px;">Mã số</td>
                            <td>Email</td>
                            <td style="width:80px;">Hành động</td>
                        </tr>
                    </thead>
                    <tfoot class="auto_check_pages">
                        <tr>
                            <td colspan="4">
                                <div class="list_action itemActions"></div>
                                <div class="pagination"></div>
                            </td>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($sale as $s_sale)
                            <form action="" method="post">
                                <tr class="row_3">
                                    <td><input type="checkbox" name="id[]" value="{{ $s_sale->id}}"></td>
                                    <td class="textC"><strong>{{$loop->index + 1}}</strong></td>
                                    <td class="textC"><strong>{{ $s_sale->Email_Sale}}</strong></td>
                                    <td class="option">
                                        <a href="{{route('Delete_sale', $s_sale->id)}}" class="del"></a>
                                        <input type="hidden" name="ID" value="{{ $s_sale->id}}">
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
