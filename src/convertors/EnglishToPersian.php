<?php

namespace Esmaeelghasemi\NumberConvertor\Convertors;


class EnglishToPersian implements ConvertorsInterface
{
    protected $englishNumbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    protected $persianNumbers = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];


    /**
     * convert number
     *
     * @param $number
     * @return string
     */
    public function convert($number): string
    {
        return str_replace($this->englishNumbers, $this->persianNumbers, $number);
    }
}
