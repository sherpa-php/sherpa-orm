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

    /**
     * @return string Current model table name
     */
    public static function getTable(): string
    {
        return self::$customTable
               ?? Naming::tableFromModel(self::class);
    }

    /**
     * Set a custom table name for current model class.
     *
     * @param string $tableName Table name to set for the current model
     */
    public static function setTable(string $tableName): void
    {
        self::$customTable = $tableName;
    }

}