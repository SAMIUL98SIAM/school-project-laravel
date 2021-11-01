<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData']= User::all();
        return view('admin.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=> 'required',
            'usertype'=> 'required',
            'email'=>'required|unique:users,email',
            'password'=>'required'
        ]);

        $user = new User() ;
        $user->name = $request->name ;
        $user->usertype = $request->usertype ;
        $user->email = $request->email ;
        $user->password = $request->password;
        // $user_save = $user->save();
        $user->save();
        // $notifications = array(
        //                        'message'=>'You Added '.$request->package_name.'package',
        //                        'alert-type'=>'success'
        //                     );
        // return redirect()->back()->with($notifications);
        return redirect()->route('users.view')->with('success','You Added User');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validatedData = $request->validate([
            'name'=> 'required',
            'usertype'=> 'required',
            'email'=>'required'
        ]);

        $user = User::find($id) ;
        $user->name = $request->name ;
        $user->usertype = $request->usertype ;
        $user->email = $request->email ;
        $user->password = $request->password;
        // $user_save = $user->save();
        $user->save();
        // $notifications = array(
        //                        'message'=>'You Added '.$request->package_name.'package',
        //                        'alert-type'=>'success'
        //                     );
        // return redirect()->back()->with($notifications);
        return redirect()->route('users.view')->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user =  User::destroy($id);
        //$notifications = array('message'=>'You Deleted these package','alert-type'=>'error');
        if($user)
        {
            return redirect()->route('users.view')->with('fail','Delete these guy');
            //return redirect()->back()->with($notifications);
        }
    }
}
