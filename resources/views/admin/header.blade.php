    <!-- Left side content -->
    <div id="left_content">
        <div id="leftSide" style="padding-top:30px;">
            <!-- Account panel -->
            <div class="sideProfile">
                <a href="{{ URL::asset('AdmincuaKhoa') }}" title="" class="profileFace"><img width="40" src="{{ URL::asset('upload/user.png') }}"></a>
                <span>Xin chào: </span>
                <span><strong>{{  Auth::guard('admin')->user()->username }}</strong></span>
                <div class="clear"></div>
            </div>
            <div class="sidebarSep"></div>
            <!-- Left navigation -->
            <ul id="menu" class="nav">
                <li class="home">
                    <a href="{{ URL::asset('AdmincuaKhoa') }}" class="{{ request()->is('AdmincuaKhoa') ? 'active' : '' }}" id="current">
                        <span>Bảng điều khiển</span>
                        <strong></strong>
                    </a>
                </li>
                <li class="product">
                    <a class=" exp">
                        <span>Danh mục Sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li>
                            <a class="{{ request()->is('AdmincuaKhoa/sanpham') ? 'act' : '' }}" href="{{ URL::asset('AdmincuaKhoa/sanpham') }}">
                                Sản phẩm </a>
                        </li>
                        <li>
                            <a class="{{ request()->is('AdmincuaKhoa/anhsanpham') ? 'act' : '' }}" href="{{ URL::asset('AdmincuaKhoa/anhsanpham') }}">
                                Chi tiết ảnh sản phẩm </a>
                        </li>
                        <li>
                            <a class="{{ request()->is('AdmincuaKhoa/loaisanpham') ? 'act' : '' }}" href="{{ URL::asset('AdmincuaKhoa/loaisanpham') }}">
                                Loại hàng </a>
                        </li>
                    </ul>
                </li>
                <li class="tran">
                    <a class=" exp">
                        <span>Quản lý bán hàng</span>
                    </a>
                    <ul class="sub">
                        <li>
                            <a class="{{ request()->is('AdmincuaKhoa/hoadon') ? 'act' : '' }}" href="{{ URL::asset('AdmincuaKhoa/hoadon') }}">
                                Hóa đơn </a>
                        </li>
                        <li>
                            <a class="{{ request()->is('AdmincuaKhoa/chitiethoadon') ? 'act' : '' }}" href="{{ URL::asset('AdmincuaKhoa/chitiethoadon') }}">
                                Chi tiết hóa đơn </a>
                        </li>
                    </ul>
                </li>
                <li class="account">
                    <a class="exp">
                        <span>Tài khoản / Hỗ trợ</span>
                    </a>
                    <ul class="sub">
                        <li>
                            <a class="{{ request()->is('AdmincuaKhoa/taikhoan') ? 'act' : '' }}" href="{{ URL::asset('AdmincuaKhoa/taikhoan') }}">
                                Quản lý tài khoản</a>
                        </li>
                        <li>
                            <a class="{{ request()->is('AdmincuaKhoa/lienhe') ? 'act' : '' }}" href="{{ URL::asset('AdmincuaKhoa/lienhe') }}">
                                Liên hệ </a>
                        </li>
                        <li>
                            <a class="{{ request()->is('AdmincuaKhoa/binhluan') ? 'act' : '' }}" href="{{ URL::asset('AdmincuaKhoa/binhluan') }}">
                                Bình Luận </a>
                        </li>
                        <li>
                            <a class="{{ request()->is('AdmincuaKhoa/khuyenmai') ? 'act' : '' }}" href="{{ URL::asset('AdmincuaKhoa/khuyenmai') }}">
                                Khuyến mãi khách hàng </a>
                        </li>
                    </ul>
                </li>
                <li class="content">
                    <a class="exp">
                        <span>Nội dung cửa hàng</span>
                    </a>
                    <ul class="sub">
                        <li>
                            <a class="{{ request()->is('AdmincuaKhoa/slide') ? 'act' : '' }}" href="{{ URL::asset('AdmincuaKhoa/slide') }}"> Slide nổi bật </a>
                        </li>
                        <li>
                            <a class="{{ request()->is('AdmincuaKhoa/nhahoptac') ? 'act' : '' }}" href="{{ URL::asset('AdmincuaKhoa/nhahoptac') }}">Nhà hợp tác</a>
                        </li>
                        <li>
                            <a class="{{ request()->is('AdmincuaKhoa/thongtin') ? 'act' : '' }}" href="{{ URL::asset('AdmincuaKhoa/thongtin') }}"> Thông tin liên hệ </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
