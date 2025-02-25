<?php

namespace App\Http\Controllers;

use App\Models\msg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MsgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function show($id)
    {
        $msg = msg::findOrFail($id);
        $msg->vu = "yes";
        $msg->save();
        return view('admin.messages_show', compact('msg'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
         ]);

        $msg = new msg();
        $msg->name = $request->name;
        $msg->email = $request->email;
        $msg->subject = $request->subject;
        $msg->message = $request->message;
        $msg->vu = "no";
        $msg->id_user = Auth::user()->id;
        $msg->save();


        return redirect()->back()->with('success', 'تم إرسال رسالتك بنجاح');
    }
    public function destroy($id)
    {
        $msg = msg::findOrFail($id);
        $msg->delete();
        return redirect()->back()->with('success', 'تم حذف الرسالة بنجاح');
    }

    public function all()
    {
        $msgs = msg::orderBy('created_at', 'desc')->get();
        return view('admin.messages', compact('msgs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\msg  $msg
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\msg  $msg
     * @return \Illuminate\Http\Response
     */
    public function edit(msg $msg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\msg  $msg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, msg $msg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\msg  $msg
     * @return \Illuminate\Http\Response
     */

}
