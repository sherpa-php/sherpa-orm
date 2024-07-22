<?php

namespace Sherpa\Orm;

use Sherpa\Orm\utilities\Naming;

trait ORM
{

    public static string $table;

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

        $query = new ORMQuery(self::class, QueryAction::SELECT);
        $query->setId($id);

        return new self();  // TODO STUB
    }

    /**
     * @return string Current model table name
     */
    public static function getTable(): string
    {
        return self::$table
               ?? Naming::tableFromModel(self::class);
    }

}