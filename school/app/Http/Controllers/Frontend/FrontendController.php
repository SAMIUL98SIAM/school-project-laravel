<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;

class FrontendController extends Controller
{
    public function index()
    {
        $data['logo'] = Logo::first();
        return view('frontend.layouts.master.home',$data);
    }

    public function course()
    {
        $data['logo'] = Logo::first();
        return view('frontend.layouts.master.course',$data);
    }

    public function teacher()
    {
        $data['logo'] = Logo::first();
        return view('frontend.layouts.master.teacher',$data);
    }

    public function about()
    {
        $data['logo'] = Logo::first();
        return view('frontend.layouts.master.about',$data);
    }

    public function pricing()
    {
        $data['logo'] = Logo::first();
        return view('frontend.layouts.master.pricing',$data);
    }

    public function blog()
    {
        $data['logo'] = Logo::first();
        return view('frontend.layouts.master.blog',$data);
    }

    public function contact()
    {
        $data['logo'] = Logo::first();
        return view('frontend.layouts.master.contact',$data);
    }

    // public function header()
    // {

    // }


}
