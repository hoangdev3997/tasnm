<?php

namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Customer_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = DB::table('users')->select('*');
        $customer = $customer->get();
        $count_customer = $customer->count();
        return view('admin.user.user',compact('customer','count_customer'));
    }

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
            $customer = DB::table('users')->select('*');
            $customer = $customer->get();
            $count_customer = $customer->count();
            return view('admin.user.user',compact('customer','count_customer'));
        } else {
            $customer = Customer::find($id);
            $customer->FullName = $request->Edit_Name;
            $customer->PassWord = $request->Edit_PassWord;
            $customer->Phone = $request->Edit_Phone;
            $customer->Address = $request->Edit_Address;
            $customer->email = $request->Edit_Email;
            $customer->save();
            return redirect()->route('Read_customer');
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
       	DB::table('users')->where('id', $id)->delete();
		return redirect()->route('Read_customer');
    }
}
