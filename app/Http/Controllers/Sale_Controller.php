<?php

namespace App\Http\Controllers;
use App\Sale;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Sale_Controller extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sale = DB::table('sales')->select('*');
        $sale = $sale->get();
        $count_sale = $sale->count();
        return view('admin.sale.sale',compact('sale','count_sale'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       	DB::table('sales')->where('id', $id)->delete();
		return redirect()->route('Read_sale');
    }
}
