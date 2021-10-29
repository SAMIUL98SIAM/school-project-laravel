<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.layouts.master.home');
    }

    public function course()
    {
        return view('frontend.layouts.master.course');
    }

    public function teacher()
    {
        return view('frontend.layouts.master.teacher');
    }

    public function about()
    {
        return view('frontend.layouts.master.about');
    }

    public function pricing()
    {
        return view('frontend.layouts.master.pricing');
    }

    public function blog()
    {
        return view('frontend.layouts.master.blog');
    }

    public function contact()
    {
        return view('frontend.layouts.master.contact');
    }


}
