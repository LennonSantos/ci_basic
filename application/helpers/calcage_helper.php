<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('calcage'))
{

	//este helper calcula a idade a partir de uma data inserida na função
	// $this->load->helper('calcage');
	// echo calcage('17/05/1995');

    function calcage($data)
    {
        list($dia, $mes, $ano) = explode('/', $data);

        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

        $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

        return $idade;
    }
}