<?php


namespace Esmaeelghasemi\NumberConvertor\Convertors;


interface ConvertorsInterface
{
    /**
     * @param $number
     * @return mixed
     */
    public function convert($number): string;
}
