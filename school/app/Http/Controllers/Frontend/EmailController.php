<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\Communicate;
use Illuminate\Http\Request;

class EmailController extends Controller
{

    // public function email_send(Request $request)
    // {
    //       $data = [
    //         'fname'=>$request->fname,
    //         'lname'=>$request->lname,
    //         'email'=>$request->email,
    //         'subject'=>$request->subject,
    //         'content'=>$request->content,
    //       ];

    //       Mail::send('frontend.emails.contact', $data, function($message) use ($data) {
    //         $message->to($data['email'])
    //         ->subject($data['subject']);
    //       });

    //     return redirect()->back()->with('success','Your message successfully sends');
    //     //   return back()->with(['message' => 'Email successfully sent!']);
    // }


    public function email_send(Request $request)
    {
        $contact = new Communicate();
        $contact->fname = $request->fname;
        $contact->lname = $request->lname;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->content = $request->content;
        $contact->save();

        $data = array(
            'fname'=>$request->fname,
            'lname'=>$request->lname,
            'email'=>$request->email,
            'subject'=> $request->subject,
            'content'=>$request->content
        );
        Mail::send('frontend.emails.contact',$data,function($messages) use($data){
            $messages->from('samiulsiam59@gmail.com','Orbitech Bd');
            $messages->to($data['email']);
            $messages->from($data['email'],'Orbitech Bd');
            // $messages->subject('Thanks for contact us');
            // $messages->from($data['email'],'Orbitech Bd');
            // $messages->to('samiulsiam59@gmail.com');
            $messages->subject('Thanks for contact us');
        });


        return redirect()->back()->with('success','Your message successfully sends');
    }
}
