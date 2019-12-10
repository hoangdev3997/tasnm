<?php

namespace App\Http\Controllers;
use App\Partner;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Partner_Controller extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partner = DB::table('partners')->select('*');
        $partner = $partner->orderBy('created_at', 'ASC')->get();
        $count_partner = $partner->count();
       return view('admin.partner.partner',compact('partner','count_partner'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $partner = new Partner;

		if ($request->hasFile('fileToInsert')) {
            $request->validate([
                'fileToInsert'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
			$newFile = $request->file('fileToInsert');
			$partner->Img_Pn = $newFile->getClientOriginalName('fileToInsert');
            $newFile->move('upload/brand', $partner->Img_Pn);
        }
        $partner->save();
		return redirect()->route('Read_partner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
       	DB::table('partners')->where('id', $id)->delete();
		return redirect()->route('Read_partner');
    }
}
