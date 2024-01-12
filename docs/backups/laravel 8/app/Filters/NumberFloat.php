<?php

namespace App\Filters;

// use Waavi\Sanitizer\Contracts\Filter;

class NumberFloat //implements Filter
{
    /**
     *  Formata dinheiro removendo a moeda e retornando um float
     *
     *  @param  string  $value
     *  @return float
     */
    public function apply($value, $options = [])
    {
        return false;
        // // verifica se foi informado algum valor
        // if (empty($value)) {
        //     return 0.00;
        // }
		// // return number_format($value, 3);
		// return (float) str_replace(',', '.', str_replace('.', '', $value));
    }
}
