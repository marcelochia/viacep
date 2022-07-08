<?php

namespace App\Tests;

use App\Api\ViaCEP;
use PHPUnit\Framework\TestCase;

class ViaCEPTest extends TestCase
{
    public function testShouldReturnAValidArray(): void
    {
        $this->assertIsArray(ViaCEP::cep('86020080'));
    }

    public function testShouldReturnAValidCEP(): void
    {
        $address = ViaCEP::cep('86020080');
        $this->assertEquals('86020-080', $address['cep']);
    }

    public function testShouldReturnAValidStreetName(): void
    {
        $address = ViaCEP::cep('86020080');
        $this->assertEquals('Avenida Higienópolis', $address['logradouro']);
    }

    public function testShouldReturnAnErrorWhenIsSentLetters(): void
    {
        $address = ViaCEP::cep('abcdefgs');
        $this->assertArrayHasKey('erro', $address);
        $this->assertEquals('CEP inválido', $address['erro']);
    }

    public function testShouldReturnAnErrorWhenIsSentAnInvalidCepFormat(): void
    {
        $address = ViaCEP::cep('12345');
        $this->assertArrayHasKey('erro', $address);
        $this->assertEquals('CEP inválido', $address['erro']);
    }

    public function testShouldReturnAnErrorWhenIsSentACepThatDoesNotExist(): void
    {
        $address = ViaCEP::cep('86000000');
        $this->assertArrayHasKey('erro', $address);
        $this->assertEquals('CEP inválido', $address['erro']);
    }
}
