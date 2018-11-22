<?php

namespace VioletaskyaContact\Controllers;

use Illuminate\Http\Request as BaseRequest;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail as BaseMail;

use VioletaskyaContact\Mail\ContactMail;
use VioletaskyaContact\Models\Contact;

class ContactController extends BaseController {

    public function store(BaseRequest $request)
    {
        $post = $request->validate([
            'email'   => "required|email",
            'name'    => "required",
            'message' => "required",
        ]);

        // Do nothing if bot ticked the checkbox.
        if ($request->term_of_service) {
            return;
        }

        $emails = explode(',', config('app.MAIL_TO'));
        if (!empty($emails)) {
            $contact = new Contact($post);

            foreach ($emails as $email) {
                BaseMail::to($email)->send(new ContactMail($contact));
            }
        }
    }

}