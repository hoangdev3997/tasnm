<?php

namespace App\Http\Controllers;
use App\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Contact_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = DB::table('contacts')->select('*');
        $contact = $contact->orderBy('created_at', 'DESC')->get();
        $count_contact = $contact->count();
        return view('admin.contact.contact',compact('contact','count_contact'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       	DB::table('contacts')->where('id', $id)->delete();
		return redirect()->route('Read_contact');
    }
}
