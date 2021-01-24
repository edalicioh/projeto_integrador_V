<?php

namespace App\Http\Controllers;

class Utils
{
    /**
     * função responsavel por converter pra o periudo completo
     *
     * @param string $period
     * @return string
     */
    public static function convertPeriod($period)
    {
        $periods = [
            'M' => "Matutino",
            'V' => "Vespertino",

        ];
        return $periods[$period];
    }
}
