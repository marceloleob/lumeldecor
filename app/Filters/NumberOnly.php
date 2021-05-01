<?php

namespace App\Filters;

// use Waavi\Sanitizer\Contracts\Filter;

class NumberOnly //implements Filter
{
    /**
     *  Retorna somente os numeros em formato string
     *
     *  @param  string  $value
     *  @return string
     */
    public function apply($value, $options = [])
    {
        return false;
		// return (string) preg_replace('/[^0-9]/', '', $value);
    }
}


