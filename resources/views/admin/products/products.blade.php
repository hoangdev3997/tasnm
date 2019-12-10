@extends('admin.master')
@section('admin.content')
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
                <h5> Danh Mục Sản Phẩm</h5>
                <span>Quản lý sản phẩm</span>
            </div>
            <div class="horControlB menu_action">
                <ul>
                    <li><a href="#" class="add">
                            <img src="{{ URL::asset('upload/icons/control/16/add.png' )}}">
                            <span>Thêm mới !!!</span>
                        </a></li>

                    <li><a href="{{ URL::asset('AdmincuaKhoa/loaisanpham') }}">
                            <img src="{{ URL::asset('upload/icons/control/16/list.png' )}}">
                            <span>Loại Hàng</span>
                        </a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="line"></div>

    <!-- Main content wrapper -->
    <div class="wrapper" id="main_product">
        <div class="widget">
            <div class="title">
                <h6>Danh sách sản phẩm </h6>
                <div class="num f12">Tổng số lượng:
                    <b> {{ $count_products ?? 0 }} </b>
                </div>
            </div>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
            <thead class="filter"><tr><td colspan="12">
                    <form class="list_filter form" action="#" method="post">
                        <table cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                                <tr>
                                    <td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
                                    <td class="item">
                                        <input name="Sea_ID" value="" id="filter_id" type="text" style="width:55px;">
                                    </td>
                                    <td class="label" style="width:65px;"><label for="filter_id">Tìm sản phẩm</label></td>
                                    <td class="item" style="width:155px;">
                                        <input name="Sea_Ten_SP" type="text" style="width:155px;">
                                    </td>
                                    <td style="width:150px">
                                        <input type="submit" class="button blueB" name="S_ch">
                                        <input type="reset" class="basic" value="Reset" onclick="document.location.href='?page=product'">
                                    </td>
                                    <td class="label" style="width:60px;"><label for="filter_status">Tìm theo loại</label></td>
                                    <td class="item">
                                        <select style="text-align-last: center; width: 170px;" onchange="location.href=this.value" _autocheck="true" class="left">
                                            <option value="">--- Lọc sản phẩm ---</option>
                                            <option value="?page=product">Mặc định</option>
                                            <option value="?page=product&amp;find=1">Trang Phục Nam</option><option value="?page=product&amp;find=2">Trang Phục Nữ</option><option value="?page=product&amp;find=3">Phụ Kiện</option><option value="?page=product&amp;find=4">Bí Ẩn</option>                                    </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </td></tr></thead>
                <thead>
                    <tr>
                        <td style="width:10px;"><img src="{{ URL::asset('upload/icons/tableArrows.png' )}}"></td>
                        <td style="width:30px;">Mã số</td>
                        <td style="width:50px;">Ảnh</td>
                        <td style="width:110px;"> Tên sản phẩm</td>
                        <td style="width:100px;">Giá / Giảm giá</td>
                        <td style="width:50px;">Màu sắc</td>
                        <td style="width:50px;">Kích thước</td>
                        <td style="width:50px;">Sự kiện sản phẩm</td>
                        <td style="width:100px;">Tên Loại</td>
                        <td>Mô tả sản phẩm</td>
                        <td style="width:70px;">Tình trạng</td>
                        <td style="width:40px;">Hành động</td>
                    </tr>
                </thead>

                <tfoot class="auto_check_pages">
                    <tr>
                        <td colspan="12">
                            <div class="list_action itemActions">

                            </div>

                            <div class="pagination">
                            </div>
                        </td>
                    </tr>
                </tfoot>
                <tbody class="list_item">
                        @foreach ($products as $product)
                            <form action="" method="post" class="form" name="filter" enctype="multipart/form-data">
                                <tr class="row_10">
                                    <td><input type="checkbox" name="id[]" value="{{ $product->id ?? '0' }}"></td>
                                    <td class="textC">{{$loop->index + 1}}</td>
                                    <td class="textC">
                                        <img src="{{ URL::asset('upload/products/'. $product->Img_SP ?? '0')}}" style="margin-bottom:5px;width:80px !important; height:auto" height="50">
                                        <div class="clear"></div>
                                        {{ $product->Img_SP ?? '0' }}                     </td>
                                    <td class="textC">
                                        <a href="#" class="tipS" title="">
                                            <b>{{ $product->Ten_SP ?? '0' }}</b>
                                        </a>
                                    </td>
                                    <td class="textC">
                                            {{ number_format($product->Gia_SP) ?? '0' }}₫
                                            <p style=" color: rgba(0, 0, 0, 0.45);text-decoration:line-through">
                                            @if ($product->GiamGia_SP != 0)
                                                {{ number_format($product->GiamGia_SP) ?? '0' }}₫
                                            @endif
                                            </p>
                                    </td>
                                    <td class="textC">{{ $product->Color_SP ?? '0' }}</td>
                                    <td class="textC">{{ $product->Size_SP ?? '0' }}</td>
                                    <td class="textC">{{ $product->Event_SP ?? 'Không có' }}</td>
                                    @php
                                        $Name_G = App\Group_SP::find($product->ID_Group);
                                        echo '<td class="textC">'.$Name_G->Ten_Group.'</td>';
                                    @endphp
                                    <td class="textC"><p>{{ $product->Mota_SP ?? '0' }}</p></td>
                                    <td class="textC">{{ $product->Availability ?? '0' }}</td>
                                    <td class="option" style="width:6%;">
                                        <button type="button" name="Edit" class="edit"
                                            data-id="{{ $product->id ?? '0' }}"
                                            data-img="{{ $product->Img_SP ?? '0' }}"
                                            data-ten="{{ $product->Ten_SP ?? '0' }}"
                                            data-gia="{{ $product->Gia_SP ?? '0' }}"
                                            data-giamgia="{{ $product->GiamGia_SP ?? '0' }}"
                                            data-color="{{ $product->Color_SP ?? '0' }}"
                                            data-size="{{ $product->Size_SP ?? '0' }}"
                                            data-event="{{ $product->Event_SP ?? '0' }}"
                                            data-idg="{{ $product->ID_Group ?? '0' }}"
                                            data-mota="{{ $product->Mota_SP ?? '0' }}"
                                            data-avty="{{ $product->Availability ?? '0' }}">
                                            <img src="{{ URL::asset('upload/icons/color/edit.png' )}}">
                                        </button>
                                        <a href="{{route('Delete_products', $product->id)}}" class="del"></a>
                                        <input type="hidden" name="ID" value="{{ $product->id ?? '0' }}">
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
                <form class="form" id="form" action="{{route('Create_products')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="widget">
                            <div class="title">
                                <img src="{{ URL::asset('upload/icons/dark/add.png' )}}" class="titleIcon">
                                <h6>Thêm Mới Sản phẩm</h6>
                            </div>
                            <ul class="tabs">
                                <li><a href="#tab1">Thông Tin Sản phẩm</a></li>
                                <li style=" border-right: unset;"><span style="font-size:10px;" class="req">* Rê Chuột Vào ? Để Xem Cách Sử Dụng Các Chức Năng</span></li>
                            </ul>
                            <div class="tab_container">
                                <div id="tab1" class="tab_content pd0">
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name"> Tên sản phẩm :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                            <input required="" style="width: 85%;" name="Ten_SP" _autocheck="true" type="text">
                                            <img class="tipS cursorP" title="Nhập tên sản phẩm." style="margin-left:9px;margin-bottom:-8px" src="{{ URL::asset('upload/icons/notifications/information.png' )}}">
                                            </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name"> Giá sản phẩm :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                            <input required="" style="width: 85%;" name="Gia_SP" _autocheck="true" type="text">
                                                <img class="tipS cursorP" title="Nhập Giá sản phẩm." style="margin-left:9px;margin-bottom:-8px" src="{{ URL::asset('upload/icons/notifications/information.png' )}}">
                                            </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name"> Giảm giá sản phẩm :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                            <input style="width: 85%;" name="GiamGia_SP" _autocheck="true" type="text">
                                            <img class="tipS cursorP" title="Nhập giảm giá sản phẩm." style="margin-left:9px;margin-bottom:-8px" src="{{ URL::asset('upload/icons/notifications/information.png' )}}">
                                            </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name"> Mô tả sản phẩm :</label>
                                        <div class="formRight">
                                            <span class="oneTwo" style="width: 100%;">
                                                {{-- style="visibility: hidden; display: none;" --}}
                                            <textarea name="Mota_SP" rows="10" ></textarea>
                                                <img style="margin-top: 5px;" class="tipS cursorP" title="Nhập mô tả sản phẩm." style="margin-left:9px;margin-bottom:-8px" src="{{ URL::asset('upload/icons/notifications/information.png' )}}">
                                            </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name"> Ảnh sản phẩm :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                                <input required="" style="width: 85%;" name="fileToInsert" _autocheck="true" type="file">
                                                <strong class="red" style="float: right;width: 100%;margin-top:1em;"></strong>
                                                <img class="tipS cursorP" title="Chọn Ảnh sản phẩm." style="margin-left:9px;margin-bottom:-8px" src="{{ URL::asset('upload/icons/notifications/information.png' )}}">
                                            </span>
                                            <div id="thumb-output"></div>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error">
                                                @foreach ($errors->all() as $error)
                                                    <li>
                                                        {{ $error }}
                                                    </li>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name"> Sự kiện sản phẩm :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                                <select name="Event_SP">
                                                    <option value="">---- Lựa chọn ----</option>
                                                    <option value="Hot">Hot</option>
                                                    <option value="New">New</option>
                                                    <option value="Sale">Sale</option>
                                                </select>
                                                <img class="tipS cursorP" title="Chọn sự kiện sản phẩm." style="margin-left:9px;margin-bottom:-8px" src="{{ URL::asset('upload/icons/notifications/information.png' )}}">
                                            </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name"> Kích thước sản phẩm :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                                <select name="Size_SP" required>
                                                    <option value="">---- Lựa chọn ----</option>
                                                    <option value="SL">SL</option>
                                                    <option value="SX">SX</option>
                                                    <option value="M">M</option>
                                                    <option value="XL">XL</option>
                                                    <option value="XXL">XXL</option>
                                                </select>
                                                <img class="tipS cursorP" title="Chọn kích thước sản phẩm." style="margin-left:9px;margin-bottom:-8px" src="{{ URL::asset('upload/icons/notifications/information.png' )}}">
                                            </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name"> Màu sắc sản phẩm :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                                <select name="Color_SP" required>
                                                    <option value="">---- Lựa chọn ----</option>
                                                    <option value="Đỏ">Đỏ</option>
                                                    <option value="Xanh lá">Xanh lá</option>
                                                    <option value="Xanh Dương">Xanh Dương</option>
                                                    <option value="Cam">Cam</option>
                                                    <option value="Trắng">Trắng</option>
                                                </select>
                                                <img class="tipS cursorP" title="Chọn Màu sắc sản phẩm." style="margin-left:9px;margin-bottom:-8px" src="{{ URL::asset('upload/icons/notifications/information.png' )}}">
                                            </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name"> Tình trạng sản phẩm:</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                            <select name="Availability" required>
                                                <option value="">---- Lựa chọn ----</option>
                                                <option value="Còn hàng">Còn hàng</option>
                                                <option value="Hết hàng">Hết hàng</option>
                                            </select>
                                            <img class="tipS cursorP" title="Chọn tình trạng sản phẩm." style="margin-left:9px;margin-bottom:-8px" src="{{ URL::asset('upload/icons/notifications/information.png' )}}">
                                            </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name">Loại sản phẩm :</label>
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
                                                <img class="tipS cursorP" title="Chọn Sản phẩm." style="margin-left:9px;margin-bottom:-8px" src="{{ URL::asset('upload/icons/notifications/information.png' )}}">
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
                    </div></div></fieldset>
                </form>
            </div>
        </div>
        <div id="popup-edit" class="popup hide-popup">
            <div class="wrap-popup">
                <form class="form" id="form" action="{{route('Take_products')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="widget">
                            <div class="title">
                                <img src="{{ URL::asset('upload/icons/dark/add.png' )}}" class="titleIcon">
                                <h6>Sửa Sản phẩm</h6>
                            </div>
                            <ul class="tabs">
                                <li><a href="#tab1">Thông Tin Sản phẩm</a></li>
                            </ul>
                            <div class="tab_container">
                                <div id="tab1" class="tab_content pd0">
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name"> Tên sản phẩm :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                            <input id="show_ten" style="width: 85%;" name="Edit_Ten_SP" _autocheck="true" type="text">
                                            </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name"> Giá sản phẩm :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                            <input id="show_gia" style="width: 85%;" name="Edit_Gia_SP" _autocheck="true" type="text">
                                            </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name"> Giảm giá sản phẩm :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                            <input id="show_giamgia" style="width: 85%;" name="Edit_GiamGia_SP" _autocheck="true" type="text">
                                            </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name"> Mô tả sản phẩm :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                            <textarea id="show_mota" name="Edit_Mota_SP" rows="10"></textarea>
                                            </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name"> Ảnh sản phẩm :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                            <input style="width: 85%;" name="fileToUpload" _autocheck="true" type="file">
                                            <input id="show_img" name="Edit_Img_SP" type="hidden">
                                            <strong class="red" style="float: right;width: 100%;margin-top:1em;"></strong>
                                            </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error">
                                                @foreach ($errors->all() as $error)
                                                    <li>
                                                        {{ $error }}
                                                    </li>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name"> Sự kiện sản phẩm :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                                <select id="show_event" name="Edit_Event_SP">
                                                    <option value="">---- Lựa chọn ----</option>
                                                    <option value="Hot">Hot</option>
                                                    <option value="New">New</option>
                                                    <option value="Sale">Sale</option>
                                                </select>
                                            </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name"> Kích thước sản phẩm :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                                <select id="show_size" name="Edit_Size_SP">
                                                    <option value="">---- Lựa chọn ----</option>
                                                    <option value="SL">SL</option>
                                                    <option value="SX">SX</option>
                                                    <option value="M">M</option>
                                                    <option value="XL">XL</option>
                                                    <option value="XXL">XXL</option>
                                                </select>
                                            </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name"> Màu sắc sản phẩm :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                                <select id="show_color" name="Edit_Color_SP">
                                                    <option value="">---- Lựa chọn ----</option>
                                                    <option value="Đỏ">Đỏ</option>
                                                    <option value="Xanh lá">Xanh lá</option>
                                                    <option value="Xanh Dương">Xanh Dương</option>
                                                    <option value="Cam">Cam</option>
                                                    <option value="Trắng">Trắng</option>
                                                </select>
                                            </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name"> Tình trạng sản phẩm:</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                                <select id="show_avty" name="Edit_Availability">
                                                    <option value="Còn hàng">Còn hàng</option>
                                                    <option value="Hết hàng">Hết hàng</option>
                                                </select>
                                            </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formRow">
                                        <label class="formLeft" for="param_name">Loại sản phẩm :</label>
                                        <div class="formRight">
                                            <span class="oneTwo">
                                                <select id="show_idg" name="Edit_ID_Group">
                                                    @php
                                                        $g_name_i = App\Group_SP::all();
                                                        foreach ($g_name_i as $g_name_i) {
                                                            echo  "<option value=".$g_name_i->id.">$g_name_i->Ten_Group</option>";
                                                        }
                                                    @endphp
                                                </select>
                                            </span>
                                            <span name="name_autocheck" class="autocheck"></span>
                                            <div name="name_error" class="clear error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="formSubmit">
                                        <input type="hidden" name="ID" id="show_id">
                                        <input name="Edit1" type="submit" value="Sửa mới" class="redB">
                                        <input type="reset" value="Hủy bỏ" class="basic cancel">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                        </div>
                    </div></fieldset>
                </form>
            </div>
        </div>
    </div>
    <div class="clear"></div>
@endsection
