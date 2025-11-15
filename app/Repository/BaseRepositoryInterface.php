<?php

declare(strict_types=1);


namespace App\Repository;

/**
 * Interface BaseRepositoryInterface.
 */
interface BaseRepositoryInterface
{
    public function create(array $attributes): mixed;

    public function all(bool $isWithTrashed = false): mixed;

    public function updateOrCreate(array $searchAttributes, array $changeAttributes);

    public function insertOrIgnore(array $attributes): mixed;

    public function insert(array $attributes): mixed;

    public function insertGetId(array $attributes): mixed;

    public function find(int $id, bool $isWithTrashed = false): mixed;

    public function findTrashed(int $id): mixed;

    public function delete(int $id): mixed;

    public function first(bool $isWithTrashed = false): mixed;

    public function firstWhere(array $params, bool $isWithTrashed = false): mixed;

    public function last(bool $isWithTrashed = false): mixed;

    public function findWhere(array $conditions, bool $isWithTrashed = false);

    public function findWhereFirst(array $conditions, bool $isWithTrashed = false);

    public function findWhereWith(array $conditions, array $relations, bool $isWithTrashed = false): mixed;

    public function updateById(int $id, array $attributes);

    public function updateWhere(array $params, array $data);

    public function updateWhereIn(string $column, array $params, array $data): void;

    public function updateWhereNotIn(string $column, array $params, array $data): void;

    public function deleteWhereIn(string $column, array $params): void;

    public function getTableName();

    public function getWithOrderBy(string $filed, string $order, bool $isWithTrashed = false);

    public function filter(?array $relations = null, ?string $orderByField = null);

    public function firstWhereWith(array $params, array $relations);

    /**
     * @param array $params Contains variable query arguments
     * @param bool $isWithTrashed
     * @return bool
     */
    public function whereExists(array $params, bool $isWithTrashed = false): bool;

    public function forcedDelete(int $id): bool;

    public function getWhereIn(string $column, array $params, bool $isWithTrashed = false): object;
}
