<?php
use PHPUnit\Framework\TestCase;

final class FuncaoTeste extends TestCase
{
    public function testEntradaDeParametrosValidasComRegex(): void
    {
        $this->assertTrue(validaEntradaDeParametrosComRegexBasico('()'));
        $this->assertTrue(validaEntradaDeParametrosComRegexBasico('{}'));
        $this->assertTrue(validaEntradaDeParametrosComRegexBasico('[]'));
        $this->assertTrue(validaEntradaDeParametrosComRegexBasico('(){}'));
        $this->assertTrue(validaEntradaDeParametrosComRegexBasico('()[]'));
        $this->assertTrue(validaEntradaDeParametrosComRegexBasico('[]{}'));
        $this->assertTrue(validaEntradaDeParametrosComRegexBasico('(){}[]'));
        $this->assertTrue(validaEntradaDeParametrosComRegexBasico('[{()}]{}[]'));
    }

    public function testEntradaDeParametrosInvalidasComRegex(): void
    {
        $this->assertFalse(validaEntradaDeParametrosComRegexBasico('(){[]'));
        $this->assertFalse(validaEntradaDeParametrosComRegexBasico('([{)]'));
        $this->assertFalse(validaEntradaDeParametrosComRegexBasico('{([})]'));
    }

    public function testEntradaDeParametrosFalsoPositivoComRegex(): void
    {
        $this->assertTrue(validaEntradaDeParametrosComRegexBasico('{([}')); // o regex basico não detecta abertura sem fechamento.
    }

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