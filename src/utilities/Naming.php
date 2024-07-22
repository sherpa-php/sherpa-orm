<?php

namespace Sherpa\Orm\utilities;

use Symfony\Component\String\Inflector\EnglishInflector;

class Naming
{

    /**
     * Convert given model name to its table name.
     *
     * @param string $model Model class
     * @return string Converted table name
     */
    public static function tableFromModel(string $model): string
    {
        $inflector = new EnglishInflector();

        return $inflector->pluralize(Format::toCamelCase(Classes::getClassNameFromPath($model)))[0];
    }

}