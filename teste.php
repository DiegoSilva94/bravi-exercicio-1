<?php
use PHPUnit\Framework\TestCase;

final class FuncaoTeste extends TestCase
{
    public function testEntradaDeParametrosValidas(): void
    {
        $this->assertTrue(validaEntradaDeParametros('()'));
        $this->assertTrue(validaEntradaDeParametros('{}'));
        $this->assertTrue(validaEntradaDeParametros('[]'));
        $this->assertTrue(validaEntradaDeParametros('(){}'));
        $this->assertTrue(validaEntradaDeParametros('()[]'));
        $this->assertTrue(validaEntradaDeParametros('[]{}'));
        $this->assertTrue(validaEntradaDeParametros('(){}[]'));
        $this->assertTrue(validaEntradaDeParametros('[{()}]{}[]'));
    }

    public function testEntradaDeParametrosInvalidas(): void
    {
        $this->assertFalse(validaEntradaDeParametros('(){[]'));
        $this->assertFalse(validaEntradaDeParametros('([{)]'));
        $this->assertFalse(validaEntradaDeParametros('{([})]'));
        $this->assertFalse(validaEntradaDeParametros('{([}'));
        $this->assertFalse(validaEntradaDeParametros('{([}])'));
    }
}