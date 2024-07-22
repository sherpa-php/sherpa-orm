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
        echo "FIND_BY_ID_MODEL_ORM_METHOD__TEST1";
    }

    /**
     * @return string Current model table name
     */
    public static function getTable(): string
    {
        return self::$customTable
               ?? Naming::tableFromModel(self::class);
    }

}