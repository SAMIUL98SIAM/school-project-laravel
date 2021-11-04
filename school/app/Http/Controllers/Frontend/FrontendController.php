<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Communicate ;
use App\Models\Logo;
use Illuminate\Support\Facades\Mail;

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
    public function contact_store(Request $request)
    {
        $contact = new Communicate();
        $contact->fname = $request->fname;
        $contact->lname = $request->lname;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        $data = array(
            'fname'=>$request->fname,
            'lname'=>$request->lname,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
        );
        Mail::send('frontend.emails.contact',$data,function($message) use($data){
            $message->from('samiulsiam59@gmail.com','Orbitech Bd');
            $message->to($data['email']);
            $message->subject('Thanks for contact us');
        });
        return redirect()->back()->with('success','Your message successfully sends');
    }

    // public function header()
    // {

    // }


}
