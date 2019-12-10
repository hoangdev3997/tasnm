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
        <!-- Title area -->
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Bình luận</h5>
                    <span>Quản lý bình luận</span>
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
                    <h6>Danh sách bình luận</h6>

                </div>

                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable taskWidget" id="checkAll">
                    <thead>
                        <tr>
                            <td style="width:21px;"><img src="{{ URL::asset('upload/icons/tableArrows.png') }}"></td>
                            <td style="width:30px;">Mã số</td>
                            <td style="width:200px;">Email bình luận</td>
                            <td style="width:250px;">Mã sản phẩm</td>
                            <td style="width:200px;">Trả lời Email</td>
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
                       @foreach ($comment as $s_comment)
                        <form action="" method="post" class="form" name="filter">
                                <tr class="row_3">
                                    <td><input type="checkbox" name="id[]" value="1"></td>
                                    <td class="textC"><strong>{{$loop->index + 1}}</strong></td>
                                    @php
                                        $Name_C = App\Customer::where('id', $s_comment->commenter_id)->first();
                                        $Name_P = App\Product::where('id', $s_comment->commentable_id)->first();
                                        $Name_RC = App\Customer::where('id', $s_comment->child_id)->first();
                                        echo'<td><strong>'.$Name_C->email.'</strong></td>';
                                        echo'<td class="textC"><strong>'.$Name_P->Ten_SP.'</strong></td>';
                                        if($s_comment->child_id != NULL){
                                            echo'<td><strong>'.$Name_RC->email.'</strong></td>';
                                        }else{
                                            echo'<td><strong></strong></td>';
                                        }

                                    @endphp
                                    <td>{{ $s_comment->comment }}</td>
                                    <td class="textC">{{ $s_comment->created_at }}</td>
                                    <td class="option">
                                        <a href="{{route('Delete_comment', $s_comment->id)}}" class="del"></a>
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
