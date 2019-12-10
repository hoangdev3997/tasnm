<?php

namespace App\Http\Controllers;
use App\Orders;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Order_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = DB::table('orders')->select('*');
        $order = $order->orderBy('created_at', 'DESC')->get();
        $count_od = $order->count();
        return view('admin.order.order',compact('order','count_od'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         if ($Edit = $request->input('Edit')) {
            $order = DB::table('orders')->select('*');
            $order = $order->orderBy('created_at', 'DESC')->get();
            $count_od = $order->count();
            return view('admin.order.order',compact('order','count_od'));
        } else {
            $order = Orders::find($id);
            $order->Phone = $request->Edit_Phone;
            $order->Address = $request->Edit_Address;
            $order->Status_Order = $request->Edit_Status_Order;
            $order->Price_Order = $request->Edit_Price_Order;
            $order->save();
            return redirect()->route('Read_order');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       	DB::table('orders')->where('id', $id)->delete();
		return redirect()->route('Read_order');
    }
}
