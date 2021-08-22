<?php

namespace App\Api;

class ViaCEP
{
    public static function cep(string $cep)
    {
        $endpoint = "http://viacep.com.br/ws/{$cep}/json/";
        
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true
        ]);
        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);
        
        return $response;
    }
}
