<?php

namespace App\Http\Controllers;

use App\Group_SP;
use App\Product;
use App\Sale;
use App\Comment;
use App\Orders;
use App\Order_detail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Cart;

class SwitchWebsite extends BaseController
{
    public function IndexC(Request $request){
        $slide = DB::table('slides')->select('*');
        $slide = $slide->get();

        $e_product = DB::table('products')->select('*')->inRandomOrder()->whereNotNull('Event_SP');
        $e_product = $e_product->get();

        $product = DB::table('products')->select('*')->inRandomOrder();
        $product = $product->get();

        $products=Product::all();

        $group_sp = DB::table('group_sps')->select('*');
        $group_sp = $group_sp->get();

        if($AddSale = $request->input('AddSale')){
            $sale = new Sale;
            $sale->Email_Sale = $request->email;
            $sale->save();
        }
       return view('website.index',compact('slide','e_product','group_sp','products','product'));
    }
    public function AboutC(){
        return view('website.about');
    }

    public function ContactC(){
        return view('website.contact');
    }
    public function LoginC(){
        return view('website.login');
    }
    public function RegiterC(){
        return view('website.register');
    }

    public function AccountC(){
        return view('website.account');
    }

    public function CartC(){
        return view('website.shopping-cart');
    }
    public function Buyed(Request $request){
        Cart::add($request->ID_SP, $request->Ten_SP, $request->qty, $request->Gia_SP, ['size' => $request->Size, 'color' => $request->Color]);
        return redirect()->route('cart');
    }
    public function Up_Cart(Request $request){
        Cart::update($request->rowId, $request->qty);
        return back();
    }
    public function Re_Cart(){
        Cart::remove(request()->id);
        return back();
    }

    public function CheckOutC(){
        return view('website.checkout');
    }
    public function R_CheckOutC(Request $request){
        if ($request->input('accept-checkout')) {
            $orders = new Orders;
            $orders::insert( [
                'FullName'=>$request->FullName,
                'Email'=>$request->Email,
                'Phone'=>$request->Phone,
                'Address'=>$request->Address,
                'Status_Order'=>0,
                'Price_Order'=>Cart::subtotal(),
            ]);
            $ID_Order = $orders::where('Email', $request->Email)->first();
            foreach(Cart::content() as $row){
                Order_detail::insert( [
                    'ID_Order'=>$ID_Order->id,
                    'ID_SP'=>$row->id,
                    'Color_Od_SP'=>$row->options->color,
                    'Size_Od_SP'=>$row->options->size,
                    'Quantity'=>$row->qty,
                ]);
            }
        }
        Cart::destroy();
        return view('website.checkout');
    }

    public function Shop(){
        $products_nb = DB::table('products')->select('*')->inRandomOrder()->whereNotNull('Event_SP')->limit(5)->get();
        $size_pr = DB::table('products')->select('Size_SP')->groupBy('Size_SP')->get();
        $color_pr = DB::table('products')->select('Color_SP')->groupBy('Color_SP')->get();
        $event_pr = DB::table('products')->select('Event_SP')->groupBy('Event_SP')->get();
        $product = DB::table('products')->select('*')->inRandomOrder()->paginate(9);
        return view('website.shop',compact('product','products_nb','size_pr','color_pr','event_pr'));
    }
    public function Shop_sort($sort){
        $products_nb = DB::table('products')->select('*')->inRandomOrder()->whereNotNull('Event_SP')->limit(5)->get();

        $size_pr = DB::table('products')->select('Size_SP')->groupBy('Size_SP')->get();
        $color_pr = DB::table('products')->select('Color_SP')->groupBy('Color_SP')->get();
        $event_pr = DB::table('products')->select('Event_SP')->groupBy('Event_SP')->get();

        if($sort != $size_pr){
            foreach ($size_pr as $s_size_pr) {
                switch($sort){
                    case $s_size_pr->Size_SP:
                        $product = DB::table('products')->select('*')->inRandomOrder()->where('Size_SP',$s_size_pr->Size_SP)->paginate(9);
                    break;
                }
            }
        }
        if($sort != $color_pr){
            foreach ($color_pr as $s_color_pr) {
                switch($sort){
                    case $s_color_pr->Color_SP:
                        $product = DB::table('products')->select('*')->inRandomOrder()->where('Color_SP',$s_color_pr->Color_SP)->paginate(9);
                    break;
                }
            }
        }
        if($sort != $event_pr){
            foreach ($event_pr as $s_event_pr) {
                switch($sort){
                    case $s_event_pr->Event_SP:
                        $product = DB::table('products')->select('*')->inRandomOrder()->where('Event_SP',$s_event_pr->Event_SP)->paginate(9);
                    break;
                }
            }
        }
        if($sort == 'giatangdan'){
            $product = DB::table('products')->select('*')->orderBy('Gia_SP', 'ASC')->paginate(9);
        }
        if($sort == 'giagiamdan'){
            $product = DB::table('products')->select('*')->orderBy('Gia_SP', 'DESC')->paginate(9);
        }
        return view('website.shop',compact('product','products_nb','size_pr','color_pr','event_pr'));
    }

    public function Shop_detail($id){
        $group_sp = Group_SP::where('id', '=', $id)->select('*')->first();
        $products_nb = DB::table('products')->select('*')->inRandomOrder()->whereNotNull('Event_SP')->limit(5);
        $products_nb = $products_nb->get();
        $product = DB::table('products')->select('*')->inRandomOrder()->where('ID_Group', $id)->paginate(9);
        $size_pr = DB::table('products')->select('Size_SP')->groupBy('Size_SP')->get();
        $color_pr = DB::table('products')->select('Color_SP')->groupBy('Color_SP')->get();
        $event_pr = DB::table('products')->select('Event_SP')->groupBy('Event_SP')->get();
        return view('website.shop_detail',compact('product','products_nb','group_sp','size_pr','color_pr','event_pr'));
    }

    public function Shop_detail_sort($id, $sort){
        $group_sp = Group_SP::where('id', '=', $id)->select('*')->first();
        $products_nb = DB::table('products')->select('*')->inRandomOrder()->whereNotNull('Event_SP')->limit(5);
        $products_nb = $products_nb->get();
        $size_pr = DB::table('products')->select('Size_SP')->groupBy('Size_SP')->get();
        $color_pr = DB::table('products')->select('Color_SP')->groupBy('Color_SP')->get();
        $event_pr = DB::table('products')->select('Event_SP')->groupBy('Event_SP')->get();
        if($sort != $size_pr){
            foreach ($size_pr as $s_size_pr) {
                switch($sort){
                    case $s_size_pr->Size_SP:
                        $product = DB::table('products')->select('*')->inRandomOrder()->where('ID_Group', $id)->where('Size_SP',$s_size_pr->Size_SP)->paginate(9);
                    break;
                }
            }
        }
        if($sort != $color_pr){
            foreach ($color_pr as $s_color_pr) {
                switch($sort){
                    case $s_color_pr->Color_SP:
                        $product = DB::table('products')->select('*')->inRandomOrder()->where('ID_Group', $id)->where('Color_SP',$s_color_pr->Color_SP)->paginate(9);
                    break;
                }
            }
        }
        if($sort != $event_pr){
            foreach ($event_pr as $s_event_pr) {
                switch($sort){
                    case $s_event_pr->Event_SP:
                        $product = DB::table('products')->select('*')->inRandomOrder()->where('ID_Group', $id)->where('Event_SP',$s_event_pr->Event_SP)->paginate(9);
                    break;
                }
            }
        }
        if($sort == 'giatangdan'){
            $product = DB::table('products')->select('*')->orderBy('Gia_SP', 'ASC')->where('ID_Group', $id)->paginate(9);
        }
        if($sort == 'giagiamdan'){
            $product = DB::table('products')->select('*')->orderBy('Gia_SP', 'DESC')->where('ID_Group', $id)->paginate(9);
        }
        return view('website.shop_detail',compact('product','products_nb','group_sp','size_pr','color_pr','event_pr'));
    }

    public function Product_detail($id){
        $products_nb = DB::table('products')->select('*')->inRandomOrder()->whereNotNull('Event_SP')->limit(5);
        $products_nb = $products_nb->get();
        $product_detail = Product::where('id', '=', $id)->select('*')->first();
        $count_cmt = DB::table('comments')->where('commentable_id', '=', $id)->count();
        return view('website.single-product',compact('count_cmt','product_detail','products_nb'));
    }

    public function Search(Request $request){
        $search = $request->search;
        $product = DB::table('products')->where('Ten_SP', 'like', '%'.$search.'%')->paginate(9);
        $products_nb = DB::table('products')->select('*')->inRandomOrder()->whereNotNull('Event_SP')->limit(5)->get();
        $size_pr = DB::table('products')->select('Size_SP')->groupBy('Size_SP')->get();
        $color_pr = DB::table('products')->select('Color_SP')->groupBy('Color_SP')->get();
        $event_pr = DB::table('products')->select('Event_SP')->groupBy('Event_SP')->get();
        return view('website.shop',compact('product','products_nb','size_pr','color_pr','event_pr'));
    }
}
