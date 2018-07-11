<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/27/2017
 * Time: 8:05 AM
 */

namespace App\Adapter;

class RajaOngkirAdapter
{
    private $url;
    private $key;

    public function __construct()
    {
        $this->key = "47bfdb0cb6109edde65dc6688a8e7487";
        $this->url = "https://api.rajaongkir.com/starter/";
    }


    public function curlAdapter($externalUrl, $requestType, $params = [])
    {
        if($requestType == 1){
            //Method GET
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $this->url.$externalUrl,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "key:".$this->key
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            return $response;

        }else{
            //Method POST
            $curl = curl_init();
            $sendingParams = http_build_query($params);
            curl_setopt_array($curl, array(
                CURLOPT_URL => $this->url.$externalUrl,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $sendingParams,
                CURLOPT_HTTPHEADER => array(
                    "content-type: application/x-www-form-urlencoded",
                    "key: ".$this->key
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            return $response;

        }

    }

}