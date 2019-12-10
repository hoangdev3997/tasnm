<?php

namespace App\Http\Controllers;
use App\Order_detail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Order_detail_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_detail = DB::table('order_details')->select('*');
        $order_detail = $order_detail->orderBy('created_at', 'DESC')->get();
        $count_odd = $order_detail->count();
        return view('admin.order_detail.order_detail',compact('order_detail','count_odd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       	DB::table('order_details')->where('id', $id)->delete();
		return redirect()->route('Read_order_detail');
    }
}
