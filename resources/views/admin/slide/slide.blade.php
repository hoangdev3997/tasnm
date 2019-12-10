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
                    <h5>Danh sách Slide nổi bật</h5>
                    <span>Quản lý Slide nổi bật</span>
                </div>
                <div class="horControlB menu_action">
                    <ul>
                        <li>
                            <a href="#" class="add">
                                <img src="{{ URL::asset('upload/icons/control/16/add.png ')}}">
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
            <div class="widget">

                <div class="title">
                    <h6>Danh sách Slide</h6>
                    <div class="num f12"><b> {{ $count_slide ?? 0 }} </b> Slide nổi bật</div>
                </div>
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable taskWidget" id="checkAll">
                    <thead>
                        <tr>
                            <td style="width:21px;"><img src="{{ URL::asset('upload/icons/tableArrows.png ')}}"></td>
                            <td style="width:30px;">Mã số</td>
                            <td style="width:150px;">Tiêu đề</td>
                            <td>Tiêu đề nổi bật</td>
                            <td style="width:150px;">Tên miêu tả</td>
                            <td style="width:150px;">Ảnh Slide</td>
                            <td style="width:100px;">Nhóm sản phẩm</td>
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
{{-- @php
    $products_name = App\Product::all();
    foreach ($products_name as $product_name) {
        echo  "<option value=".$product_name->id.">$product_name->Ten_SP</option>";
    }
@endphp --}}
                        @foreach ($slide as $s_slide)
                            <form action="{{route('Take_slide', $s_slide->id)}}" method="post" enctype="multipart/form-data">
                                @csrf()
                                <tr class="row_18">
                                    @if(isset($_POST['Edit']) && $_POST['Edit'] == $s_slide->id)
                                        <td><input type="checkbox" name="id[]" value="{{ $s_slide->id }}" /></td>
                                        <td class="textC">{{ $s_slide->id }}</td>
                                        <td class="form"><input style="padding-left:0;padding-right:0; text-align:center;" value="{{ $s_slide->Tieude_NB }}" name="Edit_Tieude_NB" _autocheck="true" type="text" /></td>
                                        <td class="form"><input style="padding-left:0;padding-right:0; text-align:center;" value="{{ $s_slide->NoiDung_Sl }}" name="Edit_NoiDung_Sl" _autocheck="true" type="text" /></td>
                                        <td class="form"><input style="padding-left:0;padding-right:0; text-align:center;" value="{{ $s_slide->Name_Sl }}" name="Edit_Name_Sl" _autocheck="true" type="text" /></td>
                                        <td class="form textC">
                                            <input style="width: auto; text-align:center;" value=" {{ $s_slide->Img_Sl ?? 'Không có dữ liệu' }}" name="fileToUpload" _autocheck="true" type="file" />
                                            <input type="hidden" name="Edit_Img_Sl" value=" {{ $s_slide->Img_Sl ?? 'Không có dữ liệu' }}">
                                        </td>
                                        <td class="form textC">
                                            <select name="Edit_ID_Group">
                                                @php
                                                    $Name_G = App\Group_SP::find($s_slide->ID_Group);
                                                    echo "<option value=".$Name_G->id.">$Name_G->Ten_Group</option>";
                                                    $g_name = App\Group_SP::all();
                                                    foreach ($g_name as $g_name) {
                                                        echo  "<option value=".$g_name->id.">$g_name->Ten_Group</option>";
                                                    }
                                                @endphp
                                            </select>
                                        </td>
                                        <td class="option">
                                            <input type="hidden" name="Edit_id" value="{{ $s_slide->id }}">
                                            <input name="Edit1" style="width: 100%;" type="submit" value="Sửa mới" class="redB" />
                                            <input type="reset" style="width: 100%; margin-top:0.5em" value="Hủy bỏ" class="basic" onClick="document.location.href='{{ url('AdmincuaKhoa/slide') }} '" />
                                        </td>
                                    @else
                                        <td><input type="checkbox" name="id[]" value="{{$s_slide->id}}"></td>
                                        <td><strong>{{$loop->index + 1}}</strong></td>
                                        <td><strong>{{$s_slide->Tieude_NB}}</strong></td>
                                        <td><strong>{{$s_slide->NoiDung_Sl}}</strong></td>
                                        <td> {{$s_slide->Name_Sl}} </td>
                                        <td class="textC">
                                            <img src="{{ URL::asset('upload/slider/'.$s_slide->Img_Sl.'')}}" style="margin-bottom:5px;width:80px !important; height:auto" height="50">
                                            <div class="clear"></div>
                                            {{$s_slide->Img_Sl}} </td>
                                        @php
                                            $Name_G = App\Group_SP::find($s_slide->ID_Group);
                                            echo '<td class="textC">'.$Name_G->Ten_Group.'</td>';
                                        @endphp
                                        <td class="option">
                                            <button type="submit" name="Edit" value="{{ $s_slide->id }}" class="edit"><img src="{{ URL::asset('upload/icons/color/edit.png') }}" /></button>
                                            <a href="{{route('Delete_slide', $s_slide->id)}}" class="del"></a>
                                            <input type="hidden" name="ID" value="{{ $s_slide->id }}">
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
                <form class="form" id="form" action="{{route('Create_slide')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="widget">
                            <div class="title">
                                <img src="{{ URL::asset('upload/icons/dark/add.png ')}}" class="titleIcon">
                                <h6>Thêm Mới Thông Tin Nhà hợp tác</h6>
                            </div>
                            <ul class="tabs">
                                <li><a href="#tab1">Thông Tin Nhà hợp tác</a></li>
                                <li style=" border-right: unset;"><span style="font-size:10px;" class="req">* Rê Chuột Vào ? Để Xem Cách Sử Dụng Các Chức Năng</span></li>
                            </ul>
                            <div class="tab_container">
                                <div id="tab1" class="tab_content pd0">
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name">Tiêu đề nổi bật :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                                <input required="" style="width: 85%;" name="Tieude_NB" id="param_name" _autocheck="true" type="text">

                                                <img class="tipS cursorP" title="Nhập Tiêu đề nổi bật." style="margin-left:9px;margin-bottom:-8px" src="{{ URL::asset('upload/icons/notifications/information.png ')}}">
                                                </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name">Nội dung :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                                <input required="" style="width: 85%;" name="NoiDung_Sl" id="param_name" _autocheck="true" type="text">
                                                <img class="tipS cursorP" title="Nhập Nội dung." style="margin-left:9px;margin-bottom:-8px" src="{{ URL::asset('upload/icons/notifications/information.png ')}}">
                                                </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name">Tên Slide :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                                <input required="" style="width: 85%;" name="Name_Sl" id="param_name" _autocheck="true" type="text">
                                                <img class="tipS cursorP" title="Nhập Tên Slide." style="margin-left:9px;margin-bottom:-8px" src="{{ URL::asset('upload/icons/notifications/information.png ')}}">
                                                </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name"> Ảnh Slide :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                                <input required="" style="width: 85%;" name="fileToInsert" id="param_name" _autocheck="true" type="file">
                                                <strong class="red" style="float: right;width: 100%;margin-top:1em;"></strong>
                                                <img class="tipS cursorP" title="Chọn Ảnh slide. " style="margin-left:9px;margin-bottom:-8px" src="{{ URL::asset('upload/icons/notifications/information.png ')}}">
                                                </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name"> Loại danh mục :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                                <select required="" name="ID_Group">
                                                    <option value="">---- Lựa chọn ----</option>
                                                    @php
                                                        $g_name_i = App\Group_SP::all();
                                                        foreach ($g_name_i as $g_name_i) {
                                                            echo  "<option value=".$g_name_i->id.">$g_name_i->Ten_Group</option>";
                                                        }
                                                    @endphp
                                                </select>
                                                <img class="tipS cursorP" title="Chọn loại danh mục " style="margin-left:9px;margin-bottom:-8px" src="{{ URL::asset('upload/icons/notifications/information.png ')}}">
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
