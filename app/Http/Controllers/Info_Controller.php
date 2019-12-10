<?php

namespace App\Http\Controllers;
use App\Info;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Info_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $info = DB::table('info_tasnms')->select('*');
        $info = $info->get();
        return view('admin.info.info',compact('info'));
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
            $info = DB::table('info_tasnms')->select('*');
            $info = $info->get();
            return view('admin.info.info',compact('info'));
        } else {
            $info = Info::find($id);
            $info->SDT_tasnm = $request->Edit_SDT;
            $info->Email_tasnm = $request->Edit_Email;
            $info->Location_tasnm = $request->Edit_Location;
            $info->Time_tasnm = $request->Edit_Time;
            $info->Content = $request->Edit_Content;
            $info->save();
            return redirect()->route('Read_info');
        }
    }
}
