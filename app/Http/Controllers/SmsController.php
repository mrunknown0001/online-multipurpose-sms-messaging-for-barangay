<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Semaphore\SemaphoreClient;

class SmsController extends Controller
{
    //1f84034453772c09dec3e7d5c6597f2f
    //8f934d4c8d91337dc98445e52faf85ab --> CLLRTrading


    public static function sendsms($numbers = null, $message = null)
    {
        $client = new SemaphoreClient('1f84034453772c09dec3e7d5c6597f2f');

        $client->send($numbers, $message);
    }

    // method use to send sms
    public static function sendMsg($number = null, $message = null)
    {

        $ch = curl_init();
        return $parameters = array(
            'apikey' => '8f934d4c8d91337dc98445e52faf85ab', //Your API KEY
            'number' =>  $number,
            'message' => $message,
            'sendername' => 'CLLRTrading' // sender name
        );
        curl_setopt( $ch, CURLOPT_URL,'http://api.semaphore.co/api/v4/messages' );
        curl_setopt( $ch, CURLOPT_POST, 1 );

        //Send the parameters set above with the request
        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

        // Receive response from server
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $output = curl_exec( $ch );
        curl_close ($ch);

        //Show the server response
        // return $output;

    }

}
