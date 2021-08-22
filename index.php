<?php

use App\Api\ViaCEP;

require __DIR__ . '/vendor/autoload.php';

$cep = ViaCEP::cep('86602104');

print_r($cep);