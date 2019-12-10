<?php

namespace App\Http\Controllers;
use App\Slide;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Slide_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = DB::table('slides')->select('*');
        $slide = $slide->orderBy('created_at', 'DESC')->get();
        $count_slide = $slide->count();
       return view('admin.slide.slide',compact('slide','count_slide'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $slide = new Slide;
        $slide->Tieude_NB = $request->Tieude_NB;
        $slide->NoiDung_Sl = $request->NoiDung_Sl;
        $slide->Name_Sl = $request->Name_Sl;
        $slide->ID_Group = $request->ID_Group;

		if ($request->hasFile('fileToInsert')) {
            $request->validate([
                'fileToInsert'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
			$newFile = $request->file('fileToInsert');
			$slide->Img_Sl = $newFile->getClientOriginalName('fileToInsert');
            $newFile->move('upload/slider', $slide->Img_Sl);
        }
        $slide->save();
		return redirect()->route('Read_slide');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
            $slide = DB::table('slides')->select('*');
            $slide = $slide->orderBy('created_at', 'DESC')->get();
            $count_slide = $slide->count();
           return view('admin.slide.slide',compact('slide','count_slide'));
        } else {
            $slide = Slide::find($id);
            $slide->Tieude_NB = $request->Edit_Tieude_NB;
            $slide->NoiDung_Sl = $request->Edit_NoiDung_Sl;
            $slide->Name_Sl = $request->Edit_Name_Sl;
            $slide->ID_Group = $request->Edit_ID_Group;
            if ($request->hasFile('fileToUpload')) {
                $request->validate([
                    'fileToUpload'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
                ]);
                $newFile = $request->file('fileToUpload');
                $slide->Img_Sl = $newFile->getClientOriginalName('fileToUpload');
                $newFile->move('upload/slider', $slide->Img_Sl);
            }
            $slide->save();
            return redirect()->route('Read_slide');
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
       	DB::table('slides')->where('id', $id)->delete();
		return redirect()->route('Read_slide');
    }
}
