<?php

namespace Sherpa\Orm\utilities;

class Format
{

    /**
     * Convert the given string to camelCase format.
     *
     * @param string $expression Expression to convert
     * @return string Converted expression
     */
    public static function toCamelCase(string $expression): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $expression));
    }

}