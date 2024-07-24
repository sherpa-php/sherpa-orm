<?php

namespace Sherpa\Orm;

use Sherpa\Orm\conditions\ConditionLinkOperator;
use Sherpa\Orm\utilities\Naming;

trait ORM
{

    public static string $table;

    private ORMQuery $query;

    public function __construct(ORMQuery $query)
    {
        $this->constructor($query);
    }

    /**
     * Constructor code.
     *
     * To be used by classes that use this trait.
     */
    public function constructor(ORMQuery $query): void
    {
        $this->query = $query;
    }

    public function where(string $leftColumn, string $operator, $rightValue): self
    {
        $this->query
             ->addCondition(ConditionLinkOperator::AND,
                            $leftColumn,
                            $operator,
                            $rightValue);

        return $this;
    }

    /**
     * @param $id
     * @return ORM
     */
    public static function findById($id): self
    {
        echo "FIND_BY_ID_MODEL_ORM_METHOD__TEST1";

        $query = new ORMQuery(self::class, QueryAction::SELECT);
        $query->setId($id);
        $query->addCondition(ConditionLinkOperator::AND, "id", '=', $id);
        echo $query->getSqlQuery();

        return new self($query);
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