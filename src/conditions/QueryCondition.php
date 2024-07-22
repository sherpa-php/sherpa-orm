<?php

namespace Sherpa\Orm\conditions;

class QueryCondition
{

    private ConditionLinkOperator $linkOperator;
    private string $leftColumn;
    private string $operator;
    private mixed $rightValue;

    public function __construct(
        ConditionLinkOperator $linkOperator,
        string $leftColumn,
        string $operator,
        mixed $rightValue)
    {
        $this->linkOperator = $linkOperator;
        $this->leftColumn = $leftColumn;
        $this->operator = $operator;
        $this->rightValue = $rightValue;
    }

    /**
     * @return string Condition statement as string ready-to-use
     */
    public function getStatement(): string
    {
        return "{$this->getLeftColumn()} {$this->getOperator()} {$this->getRightValue()}";
    }

    /**
     * @return ConditionLinkOperator "AND" / "OR" / etc.
     */
    public function getLinkOperator(): ConditionLinkOperator
    {
        return $this->linkOperator;
    }

    /**
     * @return string Left operand column name
     */
    public function getLeftColumn(): string
    {
        return $this->leftColumn;
    }

    /**
     * @return string Comparison operator
     */
    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * @return mixed Right operand value
     */
    public function getRightValue(): mixed
    {
        return $this->rightValue;
    }

}