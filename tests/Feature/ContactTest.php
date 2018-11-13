<?php

namespace VioletaskyaContact\Tests\Feature;

use VioletaskyaContact\Tests\FeatureTestCase;

class ContactTest extends FeatureTestCase
{
    /** @test */
    public function it_can_send_email()
    {
        $payload = [
            'email'   => 'test@example.com',
            'name'    => 'Audrius B.',
            'message' => 'This is a message'
        ];

        $this->post(route('contact'), $payload)
             ->assertSuccessful();
    }
}