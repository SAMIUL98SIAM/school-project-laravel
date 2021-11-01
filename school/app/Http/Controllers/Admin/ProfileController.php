<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.profile.index',compact('user'));
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
        //
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
    public function edit()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.profile.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name'=> 'required',
        //     'usertype'=> 'required',
        //     'email'=>'required'
        // ]);

        // $id = Auth::user()->id;
        // $user = User::find($id);
        $user = User::find(Auth::user()->id);
        $user->name = $request->name ;
        //$user->usertype = $request->usertype ;
        $user->email = $request->email ;
        $user->address = $request->address;
        $user->mobile = $request->mobile;
        $user->gender = $request->gender;
        // $user_save = $user->save();
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/user_image'.$user->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_image'),$filename);
            $user['image'] = $filename;
        }
        // $newImageName=time().'-'.$request->name.'.'.$request->image->extension();
        // $imageL=$request->image->move(public_path('/upload/user_image'),$newImageName);
        // $user->imageL=$newImageName;
        $user->save();
        return redirect()->route('profiles.view')->with('success','You update your profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
