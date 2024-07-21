<?php

namespace Sherpa\Orm\utilities;

class Classes
{

    /**
     * @param string $path Class path
     * @return string Class name
     */
    public static function getClassNameFromPath(string $path): string
    {
        return basename(str_replace('\\', '/', $path));
    }

}