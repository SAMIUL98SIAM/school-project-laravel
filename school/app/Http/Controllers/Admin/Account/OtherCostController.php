<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Models\AccountOtherCost;
use App\Models\Logo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OtherCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //dd($data['countLogo']);
        $data['allData']= AccountOtherCost::all();
        return view('admin.account.other_cost.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.account.other_cost.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cost = new AccountOtherCost();
        $cost->date = date('Y-m-d',strtotime($request->date));
        $cost->amount = $request->amount ;
        if($request->file('image')){
            $file = $request->file('image');
            //@unlink(public_path('upload/logo_image'.$logo->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/cost_image'),$filename);
            $cost['image'] = $filename;
        }
        $cost->description = $request->description ;
        $cost->save();
        return redirect()->route('accounts.cost.view')->with('success','Other Cost Added Successfully');
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
        $data['editData'] = AccountOtherCost::find($id);
        return view('admin.account.other_cost.edit',$data);
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

        $cost = AccountOtherCost::find($id);;
        $cost->date = date('Y-m-d',strtotime($request->date));
        $cost->amount = $request->amount ;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/cost_image'.$cost->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/cost_image'),$filename);
            $cost['image'] = $filename;
        }
        $cost->description = $request->description ;
        $cost->save();
        return redirect()->route('accounts.cost.view')->with('success','Other Cost Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $logo = Logo::find($id);
        if(file_exists('/school/public/upload/logo_image/'.$logo->image) AND !empty($logo->image))
        {
            unlink('/school/public/upload/logo_image/'.$logo->image);
        }
        $logo->delete();
        return redirect()->route('logos.view')->with('error','Logo has been deleted');
    }
}
