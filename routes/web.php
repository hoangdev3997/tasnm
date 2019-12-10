<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\middleware\CheckAdmin;
use App\Http\Controllers\SwitchWebsite;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Group_SP_Controller;
use App\Http\Controllers\Products_Controller;
use App\Http\Controllers\Auth_User_Controller;


Route::get('/', 'SwitchWebsite@IndexC')->name('home');
Route::post('/', 'SwitchWebsite@IndexC')->name('sale');

Route::get('/gioithieu', 'SwitchWebsite@AboutC')->name('about');

Route::get('/lienhe', 'SwitchWebsite@ContactC')->name('contact');

Route::get('/dangnhaptaikhoan', 'SwitchWebsite@LoginC')->name('dangnhap');
Route::post('/dangnhaptaikhoan', 'Auth_User_Controller@signIn')->name('login_user');
Route::get('/dangkytaikhoan', 'SwitchWebsite@RegiterC')->name('dangky');
Route::post('/dangkytaikhoan', 'Auth_User_Controller@signUp')->name('register_user');
Route::get('/logout', 'Auth_User_Controller@SignOut')->name('logout');

Route::get('/taikhoan', 'SwitchWebsite@AccountC')->name('account')->middleware('auth');

Route::get('/giohang', 'SwitchWebsite@CartC')->name('cart');
Route::post('/giohang', 'SwitchWebsite@Buyed')->name('buyed');
Route::post('/updategh', 'SwitchWebsite@Up_Cart')->name('up_cart');
Route::get('/xoagh/{id}', 'SwitchWebsite@Re_Cart')->name('re_cart');

Route::get('/thanhtoan', 'SwitchWebsite@CheckOutC')->name('checkOut');
Route::post('/thanhtoan', 'SwitchWebsite@R_CheckOutC')->name('re-checkOut');

Route::get('/danhmuc', 'SwitchWebsite@Shop')->name('shop');
Route::get('/danhmuc/sapxep={sort}', 'SwitchWebsite@Shop_sort')->name('shop_sort');


Route::get('/danhmuc{id}', 'SwitchWebsite@Shop_detail')->name('shop_detail')->where(['id' => '[0-9]+']);
Route::get('/danhmuc{id}/sapxep={sort}', 'SwitchWebsite@Shop_detail_sort')->name('shop_detail_sort')->where(['id' => '[0-9]+']);


Route::get('/sanpham{id}', 'SwitchWebsite@Product_detail')->name('product_detail')->where(['id' => '[0-9]+']);

Route::get('/timkiem', 'SwitchWebsite@search')->name('search');

// SwitchAdmin
//Route::get('/AdmincuaKhoa','AdminController@AdminC')->name('home')->middleware('auth:admin');

Route::group(['middleware'=>'admin'], function() {

    Route::get('/AdmincuaKhoa', 'AdminController@index')->name('index');

    Route::group(['prefix' => 'AdmincuaKhoa'], function () {

        // Sản phẩm
        Route::group(['prefix' => 'sanpham'], function () {
            //	Thêm danh mục
            Route::post('/create', ['as'=>'Create_products', 'uses'=>'Products_Controller@create']);
            //	Xem danh mục
            Route::get('/', ['as'=>'Read_products', 'uses'=>'Products_Controller@index']);
            //	Sửa danh mục
            Route::post('/update', ['as'=>'Take_products', 'uses'=>'Products_Controller@update']);
            //	Xóa danh mục
            Route::get('/delete/{id}', ['as'=>'Delete_products', 'uses'=>'Products_Controller@destroy'])->where(['id' => '[0-9]+']);
        });

        // Chi tiết ảnh sản phẩm
        Route::group(['prefix' => 'anhsanpham'], function () {
            //	Thêm danh mục
            Route::post('/create', ['as'=>'Create_product_pic', 'uses'=>'Product_pic_Controller@create']);
            //	Xem danh mục
            Route::get('/', ['as'=>'Read_product_pic', 'uses'=>'Product_pic_Controller@index']);
            //	Sửa danh mục
            Route::post('/update/{id}', ['as'=>'Take_product_pic', 'uses'=>'Product_pic_Controller@update'])->where(['id' => '[0-9]+']);
            //	Xóa danh mục
            Route::get('/delete/{id}', ['as'=>'Delete_product_pic', 'uses'=>'Product_pic_Controller@destroy'])->where(['id' => '[0-9]+']);
        });

        // Loại sản phẩm
        Route::group(['prefix' => 'loaisanpham'], function () {
            //	Thêm danh mục
            Route::post('/create', ['as'=>'Create_group_sp', 'uses'=>'Group_SP_Controller@create']);
            //	Xem danh mục
            Route::get('/', ['as'=>'Read_group_sp', 'uses'=>'Group_SP_Controller@index']);
            //	Sửa danh mục
            Route::post('/update/{id}', ['as'=>'Take_group_sp', 'uses'=>'Group_SP_Controller@update'])->where(['id' => '[0-9]+']);
            //	Xóa danh mục
            Route::get('/delete/{id}', ['as'=>'Delete_group_sp', 'uses'=>'Group_SP_Controller@destroy'])->where(['id' => '[0-9]+']);
        });

// Block 2 -----------------------------------------------------------------------------------------------

        // Hóa đơn
        Route::group(['prefix' => 'hoadon'], function () {
            //	Xem danh mục
            Route::get('/', ['as'=>'Read_order', 'uses'=>'Order_Controller@index']);
            //	Sửa danh mục
            Route::post('/update/{id}', ['as'=>'Take_order', 'uses'=>'Order_Controller@update'])->where(['id' => '[0-9]+']);
            //	Xóa danh mục
            Route::get('/delete/{id}', ['as'=>'Delete_order', 'uses'=>'Order_Controller@destroy'])->where(['id' => '[0-9]+']);
        });

        // Chi tiết hóa đơn
        Route::group(['prefix' => 'chitiethoadon'], function () {
            //	Xem danh mục
            Route::get('/', ['as'=>'Read_order_detail', 'uses'=>'Order_detail_Controller@index']);
            //	Sửa danh mục
            Route::post('/update/{id}', ['as'=>'Take_order_detail', 'uses'=>'Order_detail_Controller@update'])->where(['id' => '[0-9]+']);
            //	Xóa danh mục
            Route::get('/delete/{id}', ['as'=>'Delete_order_detail', 'uses'=>'Order_detail_Controller@destroy'])->where(['id' => '[0-9]+']);
        });

// Block 3 -----------------------------------------------------------------------------------------------

        // Tài khoản
        Route::group(['prefix' => 'taikhoan'], function () {
            //	Xem danh mục
            Route::get('/', ['as'=>'Read_customer', 'uses'=>'Customer_Controller@index']);
            //	Sửa danh mục
            Route::post('/update/{id}', ['as'=>'Take_customer', 'uses'=>'Customer_Controller@update'])->where(['id' => '[0-9]+']);
            //	Xóa danh mục
            Route::get('/delete/{id}', ['as'=>'Delete_customer', 'uses'=>'Customer_Controller@destroy'])->where(['id' => '[0-9]+']);
        });

        // Liên hệ
        Route::group(['prefix' => 'lienhe'], function () {
            //	Xem danh mục
            Route::get('/', ['as'=>'Read_contact', 'uses'=>'Contact_Controller@index']);
            //	Xóa danh mục
            Route::get('/delete/{id}', ['as'=>'Delete_contact', 'uses'=>'Contact_Controller@destroy'])->where(['id' => '[0-9]+']);
        });

         // Bình luận
         Route::group(['prefix' => 'binhluan'], function () {
            //	Xem danh mục
            Route::get('/', ['as'=>'Read_comment', 'uses'=>'Comment_Controller@index']);
            //	Xóa danh mục
            Route::get('/delete/{id}', ['as'=>'Delete_comment', 'uses'=>'Comment_Controller@destroy'])->where(['id' => '[0-9]+']);
        });

        // Khuyến mãi
        Route::group(['prefix' => 'khuyenmai'], function () {
            //	Xem danh mục
            Route::get('/', ['as'=>'Read_sale', 'uses'=>'Sale_Controller@index']);
            //	Xóa danh mục
            Route::get('/delete/{id}', ['as'=>'Delete_sale', 'uses'=>'Sale_Controller@destroy'])->where(['id' => '[0-9]+']);
        });

// Block 4 -----------------------------------------------------------------------------------------------

        // Slide
        Route::group(['prefix' => 'slide'], function () {
            //	Thêm danh mục
            Route::post('/create', ['as'=>'Create_slide', 'uses'=>'Slide_Controller@create']);
            //	Xem danh mục
            Route::get('/', ['as'=>'Read_slide', 'uses'=>'Slide_Controller@index']);
            //	Sửa danh mục
            Route::post('/update/{id}', ['as'=>'Take_slide', 'uses'=>'Slide_Controller@update'])->where(['id' => '[0-9]+']);
            //	Xóa danh mục
            Route::get('/delete/{id}', ['as'=>'Delete_slide', 'uses'=>'Slide_Controller@destroy'])->where(['id' => '[0-9]+']);
        });

         // Nhà hợp tác
        Route::group(['prefix' => 'nhahoptac'], function () {
            //	Thêm danh mục
            Route::post('/create', ['as'=>'Create_partner', 'uses'=>'Partner_Controller@create']);
            //	Xem danh mục
            Route::get('/', ['as'=>'Read_partner', 'uses'=>'Partner_Controller@index']);
            //	Xóa danh mục
            Route::get('/delete/{id}', ['as'=>'Delete_partner', 'uses'=>'Partner_Controller@destroy'])->where(['id' => '[0-9]+']);
        });

         // Thông tin cty
         Route::group(['prefix' => 'thongtin'], function () {
            //	Xem danh mục
            Route::get('/', ['as'=>'Read_info', 'uses'=>'Info_Controller@index']);
            //	Sửa danh mục
            Route::post('/update/{id}', ['as'=>'Take_info', 'uses'=>'Info_Controller@update'])->where(['id' => '[0-9]+']);
        });
    });
});
Route::get('/dangnhap', ['as'=>'login_ad', 'uses'=>'AuthController@getLogin']);
Route::post('/dangnhap', ['as'=>'login_admin', 'uses'=>'AuthController@postLogin']);
Route::get('/dangxuat', ['as'=>'logout', 'uses'=>'AuthController@getLogout']);



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
