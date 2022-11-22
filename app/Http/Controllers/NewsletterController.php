<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscriber;
use Mail;
use App\Mail\EmailManager;

class NewsletterController extends Controller
{
    public function index(Request $request)
    {
    	$users = User::all();
        $subscribers = Subscriber::all();
    	return view('admin.newsletters.index', compact('users', 'subscribers'));
    }

    public function send(Request $request)
    {
        if (env('MAIL_USERNAME') != null) {
            //sends newsletter to selected users
        	if ($request->has('user_emails')) {
                foreach ($request->user_emails as $key => $email) {
                    $array['view'] = 'emails.newsletter';
                    $array['subject'] = $request->subject;
                    $array['from'] = env('MAIL_USERNAME');
                    $array['content'] = $request->content;

                    try {
                        Mail::to($email)->queue(new EmailManager($array));
                    } catch (\Exception $e) {
                        return back()->with('error','Mail not send!!Error establishing connection');
                    }
            	}
            }

            //sends newsletter to subscribers
            if ($request->has('subscriber_emails')) {
                foreach ($request->subscriber_emails as $key => $email) {
                    $array['view'] = 'emails.newsletter';
                    $array['subject'] = $request->subject;
                    $array['from'] = env('MAIL_USERNAME');
                    $array['content'] = $request->content;

                    try {
                        Mail::to($email)->queue(new EmailManager($array));
                    } catch (\Exception $e) {
                        return back()->with('error','Mail not send!!Error establishing connection');
                    }
            	}
            }
        }
        else {
            return back()->with('error','Please configure SMTP first');
        }

    	return redirect()->route('dashboard')->with('message','Newsletter has been send');
    }

    public function subscriber(Request $request){
        $user=Subscriber::where('email',$request->email)->first();
        if($user){
            return back()->with('error','Already Subscribed');
        }else{
            $subscriber = new Subscriber();
            $subscriber->email = $request->email;
            $subscriber->save();
            return back()->with('message','Subscribed Successfully');
        }
    }
}
