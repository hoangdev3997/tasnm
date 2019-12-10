<?php

namespace App\Http\Controllers;
use App\Group_SP;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class Group_SP_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $group_sp = DB::table('group_sps')->select('*');
        $group_sp = $group_sp->orderBy('Top_Group', 'ASC')->get();
        $count_group_sp = $group_sp->count();
        return view('admin.group_sp.group_sp',compact('group_sp','count_group_sp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $group_sp = new Group_SP;
        $group_sp->Ten_Group = $request->Ten_Group;
        $group_sp->Top_Group = $request->Top_Group;

        $group_sp->save();
		return redirect()->route('Read_group_sp');
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
            $group_sp = DB::table('group_sps')->select('*');
            $group_sp = $group_sp->orderBy('Top_Group', 'ASC')->get();
            $count_group_sp = $group_sp->count();
            return view('admin.group_sp.group_sp',compact('group_sp','count_group_sp'));
        } else {
            $group_sp = Group_SP::find($id);
            $group_sp->Ten_Group = $request->Edit_Ten_Group;
            $group_sp->Top_Group = $request->Edit_Top_Group;
            $group_sp->save();
            return redirect()->route('Read_group_sp');
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
       	DB::table('group_sps')->where('id', $id)->delete();
		return redirect()->route('Read_group_sp');
    }
}


//SELECT products.ID_SP, group_sp.Ten_Group FROM products INNER JOIN group_sp ON products.ID_Group = group_sp.ID_Group WHERE group_sp.ID_Group = '1'
