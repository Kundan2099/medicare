<?php

namespace App\Http\Controllers\Web;

use App\Events\ContactEnquiryReceived;
use App\Http\Controllers\Controller;
use App\Jobs\SendContactMail;
use App\Jobs\SendContactNotification;
use App\Jobs\SendContactWlcome;
use App\Models\ContactEnquiry;
use App\Notifications\ContactNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class ContactEnquiryController extends Controller
{

    public function handleContactEnquiryCreate(Request $request): mixed
    {
        $validation = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:1', 'max:250'],
            'email' => ['required', 'email', 'string', 'min:1', 'max:250'],
            // 'phone' => ['required', 'numeric', 'digits_between:10,12'],
            'subject' => ['required', 'string', 'min:1', 'max:250'],
            'message' => ['required', 'string', 'min:1', 'max:500'],
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        } else {

            $contact_enquiry = new ContactEnquiry();
            $contact_enquiry->name = $request->input('name');
            $contact_enquiry->email = $request->input('email');
            // $contact_enquiry->phone = $request->input('phone');
            $contact_enquiry->subject = $request->input('subject');
            $contact_enquiry->message = $request->input('message');
            $contact_enquiry->save();

            $enquiry = $contact_enquiry;

            // Job through send notification
            SendContactNotification::dispatch($contact_enquiry);
            // Direction notification 
            // Notification::route('mail', 'kundankapgate2005@gmail.com')->notify(new ContactNotification($contact_enquiry));

            event(new ContactEnquiryReceived($enquiry));

            return redirect()->back()->with('message', [
                'status' => 'success',
                'title' => 'Enquiry Submited',
                'description' => 'Your enquiry is successfully submited. We will check your enquiry soon.'
            ]);
        }
    }
}
