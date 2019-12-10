<?php

namespace App\Http\Controllers;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Comment_Controller extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment = DB::table('comments')->select('*');
        $comment = $comment->orderBy('id', 'ASC')->get();
        $count_comment = $comment->count();

        return view('admin.comment.comment',compact('comment','count_comment'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       	DB::table('comments')->where('id', $id)->delete();
		return redirect()->route('Read_comment');
    }
}
