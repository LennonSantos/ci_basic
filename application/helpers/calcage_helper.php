<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('calcage'))
{

    function calcage($data)
    {
        //$data = '17/05/1995';

        list($dia, $mes, $ano) = explode('/', $data);

        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

        $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

        return $idade;
    }
}