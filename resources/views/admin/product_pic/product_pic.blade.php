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
                    <h5>Danh mục hình ảnh sản phẩm</h5>
                    <span>Quản lý hình ảnh sản phẩm</span>
                </div>

                <div class="horControlB menu_action">
                    <ul>
                        <li>
                            <a href="#" class="add">
                                <img src="{{ URL::asset('upload/icons/control/16/add.png' )}}">
                                <span>Thêm mới !!!</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ URL::asset('AdmincuaKhoa/sanpham') }}">
                                <img src="{{ URL::asset('upload/icons/control/16/list.png' )}}">
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
                    <div class="num f12">Tổng số: <b> {{ $count_product_pic ?? 0 }} </b></div>
                </div>

                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable taskWidget" id="checkAll">
                    <thead>
                        <tr>
                            <td style="width:21px;"><img src="{{ URL::asset('upload/icons/tableArrows.png' )}}"></td>
                            <td style="width:40px;">Mã số</td>
                            <td>Tên sản phẩm</td>
                            <td style="width:100px;">Hình ảnh</td>
                            <td style="width:80px;">Hành động</td>
                        </tr>
                    </thead>

                    <tfoot class="auto_check_pages">
                        <tr>
                            <td colspan="7">
                                <div class="list_action itemActions">
                                </div>

                                <div class="pagination">
                                </div>
                            </td>
                        </tr>
                    </tfoot>

                    <tbody>
                        @foreach ($product_pic as $product_pic)
                            <form action="{{route('Take_product_pic', $product_pic->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <tr class="row_18">
                                @if(isset($_POST['Edit']) && $_POST['Edit'] == $product_pic->id)
                                    <td><input type="checkbox" name="id[]" value="{{ $product_pic->ID_IMG ?? 'Không có dữ liệu' }}"></td>
                                    <td class="textC">{{ $product_pic->ID_SP ?? 'Không có dữ liệu' }}</td>
                                    @php
                                        $Name_P = App\Product::find($product_pic->ID_SP);
                                        echo '<td class="textC">'.$Name_P->Ten_SP.'</td>';
                                        echo '<input type="hidden" name="Edit_ID_SP" value="'.$product_pic->ID_SP.'">'
                                    @endphp
                                    <td class="form textC">
                                        <input style="width: auto; text-align:center;" value=" {{ $product_pic->Images ?? 'Không có dữ liệu' }}" name="fileToUpload" id="param_name" _autocheck="true" type="file" />
                                        <input type="hidden" name="Edit_Images" value=" {{ $product_pic->Images ?? 'Không có dữ liệu' }}">
                                    </td>
                                    <td class="option">
                                        <input type="hidden" name="ID" value="{{ $product_pic->ID_IMG ?? 'Không có dữ liệu' }}">
                                        <input name="Edit1" style="width: 100%;" type="submit" value="Sửa mới" class="redB" />
                                        <input type="reset" style="width: 100%; margin-top:0.5em" value="Hủy bỏ" class="basic" onClick="document.location.href='{{ url('AdmincuaKhoa/anhsanpham') }} '" />
                                    </td>
                                @else
                                    <td><input type="checkbox" name="id[]" value="{{ $product_pic->ID_IMG ?? 'Không có dữ liệu' }}"></td>
                                    <td class="textC">{{$loop->index + 1}}</td>
                                    @php
                                        $Name_P = App\Product::find($product_pic->ID_SP);
                                        echo '<td class="textC">'.$Name_P->Ten_SP.'</td>';
                                    @endphp
                                    <td class="textC">
                                        <img src="{{ URL::asset('upload/products/'.$product_pic->Images ?? 'Không có dữ liệu')}}" style="margin-bottom:5px;width:80px !important; height:auto" height="50">
                                        <div class="clear"></div>
                                        {{ $product_pic->Images ?? 'Không có dữ liệu' }} </td>
                                    <td class="option">
                                       <button type="submit" name="Edit" value="{{ $product_pic->id }}" class="edit"><img src="{{ URL::asset('upload/icons/color/edit.png') }}" /></button>
                                        <a href="{{route('Delete_product_pic', $product_pic->id)}}" class="del"></a>
                                        <input type="hidden" name="ID" value="{{ $product_pic->ID_IMG ?? 'Không có dữ liệu' }}">
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
                <form class="form" id="form" action="{{route('Create_product_pic')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="widget">
                            <div class="title">
                                <img src="{{ URL::asset('upload/icons/dark/add.png' )}}" class="titleIcon">
                                <h6>Thêm Mới Chi tiết ảnh sản phẩm</h6>
                            </div>
                            <ul class="tabs">
                                <li><a href="#tab1">Thông Tin Chi tiết ảnh sản phẩm</a></li>
                                <li style=" border-right: unset;"><span style="font-size:10px;" class="req">* Rê Chuột Vào ? Để Xem Cách Sử Dụng Các Chức Năng</span></li>
                            </ul>
                            <div class="tab_container">
                                <div id="tab1" class="tab_content pd0">
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name">Sản phẩm :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                                    <select name="ID_SP">
                                                        <option value="">---- Lựa chọn ----</option>
                                                        @php
                                                            $products_name = App\Product::all();
                                                            foreach ($products_name as $product_name) {
                                                                echo  "<option value=".$product_name->id.">$product_name->Ten_SP</option>";
                                                            }
                                                        @endphp
                                                    </select>
                                                    <img class="tipS cursorP" title="Chọn Sản phẩm." style="margin-left:9px;margin-bottom:-8px" src="{{ URL::asset('upload/icons/notifications/information.png' )}}">
                                                </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error">
                                                @error('ID_SP')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="fileToInsert"> Ảnh sản phẩm :</label>
                                        <div class="formRight">
                                            <span class="oneTwo" style="width:100%">
                                                <input style="width: 85%;" multiple name="fileToInsert[]" id="fileToInsert" _autocheck="true" type="file">
                                                <strong class="red" style="float: right;width: 100%;margin-top:1em;"></strong>
                                                <img class="tipS cursorP" title="Chọn Ảnh sản phẩm." style="margin-left:9px;margin-bottom:-8px" src="{{ URL::asset('upload/icons/notifications/information.png' )}}">
                                            </span>
                                            <div id="thumb-output"></div>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error">
                                                @error('fileToInsert')
                                                    {{ $message }}
                                                @enderror
                                            </div>
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
