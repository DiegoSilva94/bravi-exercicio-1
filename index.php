<?php
/**
 * Nessa tentativa eu usei um metodo bem simples para testar mas possui um problema com falso positivo.
 * @param string $parametros
 * @return bool
 */
function validaEntradaDeParametrosComRegexBasico(string $parametros): bool
{
    return preg_replace('/\(.*\)|\{.*\}|\[.*\]/', '', $parametros) === '';
}

/**
 * Então para não perder muito tempo na criação de um regex funcional com todas as validações de colchetes dentro de
 * colchetes vamos para uma tecnica mais pratica.
 * @param string $parametros
 * @return bool
 */
function validaEntradaDeParametros(string $parametros): bool
{
    $abertura = [];
    $fechamento = [
        '}' => '{',
        ')' => '(',
        ']' => '[',
    ];
    foreach (str_split($parametros) as $parametro) {
        if (in_array($parametro, ['{', '[', '('])) {
            $abertura[] = $parametro;
            continue;
        }
        if (!isset($fechamento[$parametro])) {
            continue;
        }

        $ultimaAbertura = array_splice($abertura, -1);

        if (array_shift($ultimaAbertura) != $fechamento[$parametro]) {
            return false;
        }
    }
    return count($abertura) === 0;
}
