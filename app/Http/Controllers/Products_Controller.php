<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class Products_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')->select('*');
        $products = $products->orderBy('Ten_SP', 'ASC')->get();
        $count_products = $products->count();
       return view('admin.products.products',compact('products','count_products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $products = new Product;
        $products->Ten_SP = $request->Ten_SP;
        $products->Gia_SP = $request->Gia_SP;
        $products->GiamGia_SP = $request->GiamGia_SP;
        $products->Mota_SP = $request->Mota_SP;
        $products->Availability = $request->Availability;
        $products->Event_SP = $request->Event_SP;
        $products->Size_SP = $request->Size_SP;
        $products->Color_SP = $request->Color_SP;
        $products->ID_Group = $request->ID_Group;

		if ($request->hasFile('fileToInsert')) {
            $request->validate([
                'fileToInsert'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
			$newFile = $request->file('fileToInsert');
			$products->Img_SP = $newFile->getClientOriginalName('fileToInsert');
            $newFile->move('upload/products', $products->Img_SP);
        }
        $products->save();
		return redirect()->route('Read_products');
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
    public function update(Request $request)
    {
        $id = $request->ID;
        $products = Product::find($id);
        $products->Ten_SP = $request->Edit_Ten_SP;
        $products->Gia_SP = $request->Edit_Gia_SP;
        $products->GiamGia_SP = $request->Edit_GiamGia_SP;
        $products->Mota_SP = $request->Edit_Mota_SP;
        $products->Availability = $request->Edit_Availability;
        $products->Event_SP = $request->Edit_Event_SP;
        $products->Size_SP = $request->Edit_Size_SP;
        $products->Color_SP = $request->Edit_Color_SP;
        $products->ID_Group = $request->Edit_ID_Group;

		if ($request->hasFile('fileToUpload')) {
            $request->validate([
                'fileToUpload'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
			$newFile = $request->file('fileToUpload');
			$products->Img_SP = $newFile->getClientOriginalName('fileToUpload');
            $newFile->move('upload/products', $products->Img_SP);
        }
        $products->save();
        return redirect()->route('Read_products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       	DB::table('products')->where('id', $id)->delete();
		return redirect()->route('Read_products');
    }
}

