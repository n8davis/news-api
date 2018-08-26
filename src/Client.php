<?php
/**
 * Created by PhpStorm.
 * User: nate
 * Date: 8/26/18
 * Time: 2:02 PM
 */

namespace News;


class Client
{

    CONST GET = 'GET';
    CONST POST = 'POST';
    CONST PUT = 'PUT' ;
    CONST PATCH = 'PATCH';
    public $api_url = '';
    public $api_password = '';
    public $api_key = '';
    public $api_shopifyToken = '';
    public $httpCode;


    public $curlHeader;
    public $fullresults;
    public $response;
    public $headers = [];

    public $timeOfLastShopifyCall = 0;
    public $api_calls = 0;
    public $api_max_calls = 35;
    public $retryCount = 0;


    /**
     * @param $uri
     * @param $dataToPost
     * @param $type
     * @param $headers
     * @return bool|mixed
     */
    function request($uri, $dataToPost, $type , $headers )
    {
        if ( ! $uri || strlen( $uri ) === 0 ) return false ;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL , $uri );
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2 );
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers );
        curl_setopt($curl, CURLOPT_VERBOSE, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 0);
        switch ( strtoupper( $type ) ){
            case 'PUT':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode( $dataToPost ) );
                break; 
            case 'DELETE':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
                break; 
            case 'POST':
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode( $dataToPost ) );
                break; 
            case 'GET':
                curl_setopt($curl, CURLOPT_POST, 0);
                break; 
        }

        $results           = curl_exec($curl);
        $this->fullresults = $results;
        $this->httpCode    = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $this->response    = $results;

        curl_close($curl);
        return $results; 
    }




}
