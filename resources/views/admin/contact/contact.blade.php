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
                    <h5>Phản hồi</h5>
                    <span>Quản lý phản hồi</span>
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
                    <h6>Danh sách Phản hồi</h6>
                    <div class="num f12"><b> {{ $count_contact ?? 0 }} </b> Phản hồi</div>
                </div>

                <ul class="tabs">
                    <li class="activeTab" style="height: 36px;"><a>Chờ Kiểm Duyệt</a></li>
                </ul>

                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable taskWidget" id="checkAll">
                    <thead>
                        <tr>
                            <td style="width:21px;"><img src="{{ URL::asset('upload/icons/tableArrows.png') }}"></td>
                            <td style="width:30px;">Mã số</td>
                            <td style="width:100px;">Người phản hồi</td>
                            <td style="width:175px;">Email</td>
                            <td style="width:175px;">Tiêu Đề</td>
                            <td>Nội dung</td>
                            <td style="width:90px;">Ngày gửi</td>
                            <td style="width:80px;">Hành động</td>
                        </tr>
                    </thead>

                    <tfoot class="auto_check_pages">
                        <tr>
                            <td colspan="8">
                                <div class="list_action itemActions">
                                </div>

                                <div class="pagination">
                                </div>
                            </td>
                        </tr>
                    </tfoot>

                    <tbody>
                        @foreach ($contact as $s_contact)
                            <form action="" method="post">
                                <tr class="row_3">
                                    <td><input type="checkbox" name="id[]" value="{{ $s_contact->id }}"></td>
                                    <td class="textC"><strong>{{$loop->index + 1}}</strong></td>
                                    <td><strong>{{ $s_contact->FullName_CT }}</strong></td>
                                    <td><strong>{{ $s_contact->Email_CT }}</strong></td>
                                    <td><strong>{{ $s_contact->Tieude_CT }}</strong></td>
                                    <td>{{ $s_contact->Message }}</td>
                                    <td class="textC">{{ $s_contact->created_at }}</td>
                                    <td class="option">
                                        <a style="margin-left:0 !important;padding-top:1px !important; padding-bottom:1px !important" href="{{route('Delete_contact', $s_contact->id)}}" class="del"></a>
                                        <input type="hidden" name="ID" value="{{ $s_contact->id }}">
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
