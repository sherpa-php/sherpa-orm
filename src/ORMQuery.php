<?php

namespace Sherpa\Orm;

use Sherpa\Orm\conditions\ConditionLinkOperator;
use Sherpa\Orm\conditions\QueryCondition;

class ORMQuery
{

    private string $model;
    private QueryAction $action;
    private array $columns;
    private mixed $id;
    private array $conditions;

    public function __construct(string $model, QueryAction $action)
    {
        $this->model = $model;
        $this->action = $action;
        $this->conditions = [];
    }

    /**
     * @param array $columns Columns to retrieve
     */
    public function setColumns(array $columns): void
    {
        $this->columns = $columns;
    }

    /**
     * @param mixed $id Database row ID to use
     */
    public function setId(mixed $id): void
    {
        $this->id = $id;
    }

    /**
     * Append a new condition to current query.
     *
     * @param ConditionLinkOperator $linkOperator
     * @param string $leftColumn
     * @param string $operator
     * @param mixed $rightValue
     */
    public function addCondition(
        ConditionLinkOperator $linkOperator,
        string $leftColumn,
        string $operator,
        mixed $rightValue): void
    {
        $this->conditions[] = new QueryCondition($linkOperator, $leftColumn, $operator, $rightValue);
    }

    /**
     * @return string Generated SQL query
     */
    public function getSqlQuery(): string
    {
        return match ($this->getAction())
        {
            QueryAction::SELECT => $this->getQueryAsSelectAction(),
            QueryAction::UPDATE => throw new \Exception('To be implemented'),
            QueryAction::INSERT => throw new \Exception('To be implemented'),
            QueryAction::DELETE => throw new \Exception('To be implemented'),
        };
    }

    /**
     * @return string Generated SELECT pattern based SQL query
     */
    private function getQueryAsSelectAction(): string
    {
        return "SELECT {$this->getColumnsAsString()} FROM {$this->model::getTable()}"
              . $this->getWhereStatement();
    }

    /**
     * @return string Columns as string
     */
    private function getColumnsAsString(): string
    {
        return isset($this->columns)
            ? implode(', ', $this->columns)
            : '*';
    }

    /**
     * @return string|null WHERE statement if there are conditions or NULL
     */
    private function getWhereStatement(): ?string
    {
        $where = null;

        if ($this->hasConditions())
        {
            $where = " WHERE {$this->getConditions()[0]->getStatement()}";

            for ($conditionIndex = 1; $conditionIndex < count($this->getConditions()); $conditionIndex++)
            {
                $condition = $this->getConditions()[$conditionIndex];

                $where .= $condition->getLinkOperator()->value
                        . $condition->getStatement();
            }
        }

        return $where;
    }

    /**
     * @return array Query conditions
     */
    public function getConditions(): array
    {
        return $this->conditions;
    }

    /**
     * @return bool If there are conditions
     */
    public function hasConditions(): bool
    {
        return count($this->getConditions());
    }

    /**
     * @return string Model class name
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return QueryAction
     */
    public function getAction(): QueryAction
    {
        return $this->action;
    }

    /**
     * @return array Columns to retrieve
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * @return mixed ID to use on rows retrieving if given
     */
    public function getId(): mixed
    {
        return $this->id;
    }

}