<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\TestMail;
use App\Models\Communicate ;
use App\Models\Logo;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
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
        $contact->content = $request->content;
        $contact->save();

        // $fname = $request->fname;
        // $lname = $request->lname;
        // $email = $request->email;
        // $subject = $request->subject;
        // $message = $request->message;
        // require 'PHPMailer/vendor/autoload.php';

        //Create an instance; passing `true` enables exceptions
        // $mail = new PHPMailer(true);
        // $mail->SMTPDebug = 0;
        // $mail->isSMTP();
        // $mail->Host = env('MAIL_HOST');
        // $mail->SMTPAuth = 'true';
        // $mail->Username = env('MAIL_USERNAME');
        // $mail->Password = env('MAIL_PASSWORD');
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        // $mail->Port = 587 ;
        // $mail->setFrom($email,$fname,$lname);
        // $mail->Subject = $subject ;
        // $mail->Body = $messages ;
        // $dt = $mail->send();
        // if($dt)
        // {
        //     return redirect()->back()->with('success','Your message successfully sends');
        // }
        $data = array(
            'fname'=>$request->fname,
            'lname'=>$request->lname,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'content'=>$request->content
        );
        Mail::send('frontend.emails.contact',$data,function($messages) use($data){
            $messages->from('samiulsiam59@gmail.com','Orbitech Bd');
            $messages->to($data['email']);
            // $messages->from($data['email'],'Orbitech Bd');
            // $messages->to('samiulsiam89@gmail.com');
            $messages->subject('Thanks for contact us');
        });


        return redirect()->back()->with('success','Your message successfully sends');
    }

    // public function header()
    // {

    // }


}
