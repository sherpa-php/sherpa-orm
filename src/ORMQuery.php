<?php

namespace Sherpa\Orm;

class ORMQuery
{

    private string $model;
    private array $columns;
    private mixed $id;

    public function __construct(string $model)
    {
        $this->model = $model;
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

}