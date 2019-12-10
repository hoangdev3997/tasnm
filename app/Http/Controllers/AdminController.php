<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Customer;
use App\Orders;
use App\Product;
use App\Sale;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('orders') -> get();
        $count_order = $orders->count();

        $products = DB::table('products')->select('*');
        $count_products = $products->count();

        $contacts = DB::table('contacts')->select('*');
        $count_customer = $contacts->count();

        $sales = DB::table('sales')->select('*');
        $count_contact = $sales->count();

        $customers = DB::table('users')->select('*');
        $count_sale = $customers->count();

        $sum_orders = DB::table('orders') -> sum('Price_Order');
        return view('admin.index',compact('orders','count_products', 'count_customer', 'sum_orders', 'count_contact', 'count_sale', 'count_order'));
    }
}
