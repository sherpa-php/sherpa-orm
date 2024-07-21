<?php

namespace Sherpa\Orm\exceptions;

class CannotRetrieveTableNameFromModelException extends SherpaORMException
{

    protected $code = "SHERPA_ORM_001_TBL";

    public function __construct(string $model)
    {
        $this->message = "
        <span class='font-mono code-quote'>$model</span>
        table name can not be retrieved.
        ";
    }

}