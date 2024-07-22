<?php

namespace Sherpa\Orm;

use Sherpa\Orm\utilities\Naming;

trait ORM
{

    private static string $customTable;

    public function __construct()
    {
        $this->constructor();
    }

    /**
     * Constructor code.
     *
     * To be used by classes that use this trait.
     */
    public function constructor(): void
    {
        //
    }

    public static function findById(mixed $id): self
    {

    }

}