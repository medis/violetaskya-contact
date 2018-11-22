<?php

namespace VioletaskyaContact\Tests\Feature;

use Illuminate\Support\Facades\Mail as BaseMail;

use VioletaskyaContact\Tests\FeatureTestCase;
use VioletaskyaContact\Mail\ContactMail;

class ContactTest extends FeatureTestCase
{

    protected $testPayload = [
        'email'   => 'test@example.com',
        'name'    => 'Audrius B.',
        'message' => 'This is a message'
    ];

    /** @test */
    public function it_validates_correctly()
    {
        $response = $this->post(route('contact'), []);
        $errors = session('errors');

        $this->assertEquals($errors->get('email')[0],"The email field is required.");
        $this->assertEquals($errors->get('name')[0],"The name field is required.");
        $this->assertEquals($errors->get('message')[0],"The message field is required.");

        $response = $this->post(route('contact'), [
            'email'   => 'test@example',
            'name'    => 'Audrius B.',
            'message' => 'This is a message'
        ]);
        $errors = session('errors');

        $this->assertEquals($errors->get('email')[0],"The email must be a valid email address.");
    }

    /** @test */
    public function it_can_send_email()
    {
        BaseMail::fake();

        $this->post(route('contact'), $this->testPayload);

        BaseMail::assertSent(ContactMail::class, function ($mail) {
            return $mail->hasTo($this->testPayload['email']);
        });
    }

    /** @test */
    public function it_can_detect_honeypot_protection()
    {
        BaseMail::fake();

        $payload = array_merge(['term_of_service' => 1], $this->testPayload);

        $this->post(route('contact'), $payload);

        BaseMail::assertNotSent(ContactMail::class);
    }
}
