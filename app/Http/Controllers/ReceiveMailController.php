<?php

namespace App\Http\Controllers;

require_once(__DIR__ .'vendor/autoload.php');

use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;

final class ReceiveMailController extends TestCase
{
    //
    public function testCanUseMailersInPHP(): void{
        //Configure
        $config = MailSlurpSDK\Configuration::getDefaultConfiguration()->setApiKey('x-api-key','8add1e4aeee83c4ef5c4a4e55019d18df9e0bc4043d6b002759fdd2d222fe9aa');
        $apiInstance = new MailSlurpSDK\MailSlurpAPI\CommonOperationsApi(
            new GuzzleHttp\Client(),
            $config
        );
        //New Mail
        $result = $apiInstance->createNewEmailAddressUsingPOST();
        $this->assertStringContainsString(
            "mailslutp.com",
            $result["email_address"]
        );
    }

}
