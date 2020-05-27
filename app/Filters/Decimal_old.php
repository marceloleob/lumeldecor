<?php

namespace App\Filters;

use Waavi\Sanitizer\Contracts\Filter;

class Decimal implements Filter
{
    /**
     *  Formata dinheiro removendo a moeda e retornando um float
     *
     *  @param  string  $value
     *  @return float
     */
    public function apply($value, $options = [])
    {
        // retorna formatado
        return number_format((float) $value, (int) 2);
    }
}
