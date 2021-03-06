<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Messaging\V1;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Serialize;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class CampaignTest extends HolodeckTestCase {
    public function testFetchRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->messaging->v1->campaigns("CMXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://messaging.twilio.com/v1/a2p/Campaigns/CMXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testFetchResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "CMdeadbeef66043a43b62be6d67c635c85",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "messaging_service_sid": "MGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "2021-01-27T14:47:52Z",
                "date_updated": "2021-01-27T14:47:52Z",
                "description": "Test description for test campaing",
                "message_samples": [
                    "Test_Sample_1",
                    "Another_test_sample_2"
                ],
                "status": "pending",
                "failure_reason": null,
                "use_case": "PUBLIC_SERVICE_ANNOUNCEMENT",
                "has_embedded_links": true,
                "has_embedded_phone": false,
                "brand_registration_sid": "BN0044409f7e067e279523808d267e2d85",
                "url": "https://messaging.twilio.com/v1/a2p/Campaigns/CMdeadbeef66043a43b62be6d67c635c85"
            }
            '
        ));

        $actual = $this->twilio->messaging->v1->campaigns("CMXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();

        $this->assertNotNull($actual);
    }

    public function testReadRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->messaging->v1->campaigns->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://messaging.twilio.com/v1/a2p/Campaigns'
        ));
    }

    public function testReadFullResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://messaging.twilio.com/v1/a2p/Campaigns?PageSize=50&Page=0",
                    "previous_page_url": null,
                    "next_page_url": null,
                    "key": "data",
                    "url": "https://messaging.twilio.com/v1/a2p/Campaigns?PageSize=50&Page=0"
                },
                "data": [
                    {
                        "sid": "CMdeadbeef66043a43b62be6d67c635c85",
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "messaging_service_sid": "MGaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "date_created": "2021-01-27T14:47:52Z",
                        "date_updated": "2021-01-27T14:47:53Z",
                        "description": "Test description for test campaing",
                        "message_samples": [
                            "Test_Sample_1",
                            "Another_test_sample_2"
                        ],
                        "status": "pending",
                        "failure_reason": null,
                        "use_case": "GAMBLING_SWEEPSTAKE",
                        "has_embedded_links": true,
                        "has_embedded_phone": false,
                        "brand_registration_sid": "BN0044409f7e067e279523808d267e2d85",
                        "url": "https://messaging.twilio.com/v1/a2p/Campaigns/CMdeadbeef66043a43b62be6d67c635c85"
                    }
                ]
            }
            '
        ));

        $actual = $this->twilio->messaging->v1->campaigns->read();

        $this->assertGreaterThan(0, \count($actual));
    }

    public function testCreateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->messaging->v1->campaigns->create("BNXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX", "use_case", "description", ["message_samples"], True, True, "MGXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = [
            'BrandRegistrationSid' => "BNXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
            'UseCase' => "use_case",
            'Description' => "description",
            'MessageSamples' => Serialize::map(["message_samples"], function($e) { return $e; }),
            'HasEmbeddedLinks' => Serialize::booleanToString(True),
            'HasEmbeddedPhone' => Serialize::booleanToString(True),
            'MessagingServiceSid' => "MGXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
        ];

        $this->assertRequest(new Request(
            'post',
            'https://messaging.twilio.com/v1/a2p/Campaigns',
            null,
            $values
        ));
    }

    public function testCreateResponse(): void {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "sid": "CMdeadbeef66043a43b62be6d67c635c85",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "messaging_service_sid": "MG3u3kcgofdljponkatswl3ad3ev0c123u",
                "brand_registration_sid": "BN0044409f7e067e279523808d267e2d85",
                "date_created": "2021-01-27T14:47:52Z",
                "date_updated": "2021-01-27T14:47:52Z",
                "description": "Send marketing messages about sales and offers to opted in customers.",
                "message_samples": [
                    "EXPRESS: Denim Days Event is ON",
                    "LAST CHANCE: Book your next flight for just 1 (ONE) EUR"
                ],
                "status": "pending",
                "failure_reason": null,
                "use_case": "2FA",
                "has_embedded_links": true,
                "has_embedded_phone": false,
                "url": "https://messaging.twilio.com/v1/a2p/Campaigns/CMdeadbeef66043a43b62be6d67c635c85"
            }
            '
        ));

        $actual = $this->twilio->messaging->v1->campaigns->create("BNXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX", "use_case", "description", ["message_samples"], True, True, "MGXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX");

        $this->assertNotNull($actual);
    }

    public function testDeleteRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->messaging->v1->campaigns("CMXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->delete();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'delete',
            'https://messaging.twilio.com/v1/a2p/Campaigns/CMXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testDeleteResponse(): void {
        $this->holodeck->mock(new Response(
            204,
            null
        ));

        $actual = $this->twilio->messaging->v1->campaigns("CMXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->delete();

        $this->assertTrue($actual);
    }
}