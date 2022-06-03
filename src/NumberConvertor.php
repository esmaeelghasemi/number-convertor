<?php


namespace Esmaeelghasemi\NumberConvertor;


class NumberConvertor
{
    private static $instance = null;

    protected static $number;
    protected static $from;
    protected static $to;

    protected function __constructor()
    {
    }

    /**
     * make this class singleton
     *
     * @return NumberConvertor|null
     */
    protected static function getInstance(): ?NumberConvertor
    {
        if (self::$instance == null) {
            self::$instance = new NumberConvertor();
        }

        return self::$instance;
    }

    /**
     * get the number to convert
     *
     * @param $number
     * @return NumberConvertor|null
     */
    public static function number($number): ?NumberConvertor
    {
        self::$number = $number;

        return self::getInstance();
    }


    /**
     * get the 'from' and 'to' language dynamically
     *
     * @param $method
     * @param $args
     * @return NumberConvertor|null
     */
    public function __call($method, $args)
    {
        if (preg_match('/^from.*/', $method)) {
            self::$from = str_replace('from', '', $method);
        } else if (preg_match('/^to.*/', $method)) {
            self::$to = str_replace('to', '', $method);
        }

        return self::getInstance();
    }

    /**
     * return the result of convert
     *
     * @return mixed
     */
    public static function get(): mixed
    {
        $convertorClassName = __NAMESPACE__ . '\\Convertors\\' . self::$from . 'To' . self::$to;
        $callConvertorClass = new $convertorClassName();

        return $callConvertorClass->convert(self::$number);
    }


}
