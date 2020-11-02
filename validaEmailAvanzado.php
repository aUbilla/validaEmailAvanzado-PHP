<?php

/**
 * Validador de Email avanzado (comprueba registros MX para verificar existencia de dominio).
 *
 * @param $str
 * @return bool
 */

function validaEmailAvanzado($str) {
    $result = (false !== filter_var($str, FILTER_VALIDATE_EMAIL));

    if ($result) {
        list($user, $domain) = split('@', $str);
        $result = checkdnsrr($domain, 'MX');
    }

    return $result;
}