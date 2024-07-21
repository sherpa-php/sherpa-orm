<?php

namespace Sherpa\Orm\exceptions;

use Exception;
use Throwable;

class SherpaORMException
{

    public const EXCEPTION_TYPE = "SHERPA_ORM";

    protected $message = "A Sherpa ORM exception occurred…";
    protected $code = "SHERPA_ORM_00";

}