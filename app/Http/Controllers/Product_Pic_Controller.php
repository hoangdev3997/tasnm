<?php

namespace App\Http\Controllers;
use App\Product_pic;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Product_Pic_Controller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_pic = DB::table('images')->select('*');
        $product_pic = $product_pic->orderBy('ID_SP', 'ASC')->get();
        $count_product_pic = $product_pic->count();
        return view('admin.product_pic.product_pic',compact('product_pic','count_product_pic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->hasFile('fileToInsert'))
        {
            $request->validate([
                'ID_SP'=>'required',
                'fileToInsert' => 'required',
                'fileToInsert.*'=>'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            $files = $request->file('fileToInsert');
            foreach ($files as $file) {
                $ID_SP = $request->ID_SP;
                $Images = $file->getClientOriginalName('fileToInsert');
                $file->move('upload/products', $Images);
                Product_pic::insert( [
                    'ID_SP'=>$ID_SP,
                    'Images'=>$Images,
                ]);
            }
        }
        return redirect()->route('Read_product_pic');
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
            $product_pic = DB::table('images')->select('*');
            $product_pic = $product_pic->orderBy('ID_SP', 'ASC')->get();
            $count_product_pic = $product_pic->count();
            return view('admin.product_pic.product_pic',compact('product_pic','count_product_pic'));
        } else {
            $product_pic = Product_pic::find($id);
            $product_pic->ID_SP = $request->Edit_ID_SP;
            if ($request->hasFile('fileToUpload')) {
                $request->validate([
                    'fileToUpload'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
                ]);
                $newFile = $request->file('fileToUpload');
                $product_pic->Images = $newFile->getClientOriginalName('fileToUpload');
                $newFile->move('upload/products', $product_pic->Images);
            }
            $product_pic->save();
            return redirect()->route('Read_product_pic');
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
       	DB::table('images')->where('id', $id)->delete();
		return redirect()->route('Read_product_pic');
    }
}
