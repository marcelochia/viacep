<?php

namespace App\Api;

class ViaCEP
{
    public static function cep(string $cep): array
    {
        if (strlen($cep) !== 8) {
            return ['erro' => 'CEP inválido'];
        }

        $endpoint = "http://viacep.com.br/ws/{$cep}/json/";
        
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FAILONERROR => true
        ]);

        $exec = curl_exec($curl);
        curl_close($curl);

        $response = json_decode($exec, true);

        if (curl_errno($curl) > 0 || array_key_exists('erro', $response)) {
            return ['erro' => 'CEP inválido'];
        }
                
        return $response;
    }
}
