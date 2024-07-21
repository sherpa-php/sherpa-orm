<?php

namespace Sherpa\Orm\utilities;

use Symfony\Component\String\Inflector\EnglishInflector;

class Naming
{

    public static function tableFromModel(string $model): string
    {
        $inflector = new EnglishInflector();

        return $inflector->pluralize(Format::toCamelCase(Classes::getClassNameFromPath($model)))[0];
    }

}