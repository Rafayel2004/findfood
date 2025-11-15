<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Repository\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface
{
    public mixed $model;

    /** BaseRepository constructor. */
    public function __construct(mixed $model)
    {
        $this->model = $model;
    }

    public function create(array $attributes): mixed
    {
        return $this->model->create($attributes);
    }

    public function updateOrCreate(array $searchAttributes, array $changeAttributes): mixed
    {
        return $this->model->updateOrCreate($searchAttributes, $changeAttributes);
    }

    public function insertOrIgnore(array $attributes): mixed
    {
        return $this->model->insertOrIgnore($attributes);
    }

    public function insert(array $attributes): mixed
    {
        return $this->model->insert($attributes);
    }

    public function insertGetId(array $attributes): mixed
    {
        return $this->model->insertGetId($attributes);
    }

    public function find(int $id, bool $isWithTrashed = false): mixed
    {
        return $isWithTrashed
            ? $this->model->withTrashed()->find($id)
            : $this->model->find($id);
    }

    public function findTrashed(int $id): mixed
    {
        return $this->model->onlyTrashed()->find($id);
    }

    public function all(bool $isWithTrashed = false): mixed
    {
        return $isWithTrashed
            ? $this->model->withTrashed()->all()
            : $this->model->all();
    }

    public function delete(int $id): mixed
    {
        return $this->model->findOrFail($id)->delete();
    }

    /**
     * @param array $params Contains variable query arguments
     * @return mixed
     */
    public function deleteWhere(array $params): mixed
    {
        return $this->model->where($params)->delete();
    }

    public function updateById(int $id, array $attributes): mixed
    {
        return $this->model->findOrFail($id)->update($attributes);
    }

    public function updateWhere(array $params, array $data): void
    {
        $this->model->where($params)->update($data);
    }

    public function updateWhereIn(string $column, array $params, array $data): void
    {
        $this->model->whereIn($column, $params)->update($data);
    }

    public function updateWhereNotIn(string $column, array $params, array $data): void
    {
        $this->model->whereNotIn($column, $params)->update($data);
    }

    public function deleteWhereIn(string $column, array $params): void
    {
        $this->model->whereIn($column, $params)->delete();
    }

    public function first(bool $isWithTrashed = false): mixed
    {
        return $isWithTrashed
            ? $this->model->withTrashed()->first()
            : $this->model->first();
    }

    public function firstWhere(array $params, bool $isWithTrashed = false): mixed
    {
        return $isWithTrashed
            ? $this->model->withTrashed()->where($params)->first()
            : $this->model->where($params)->first();
    }

    public function last(bool $isWithTrashed = false): mixed
    {
        return $isWithTrashed
            ? $this->model->withTrashed()->orderByDesc('id')->first()
            : $this->model->orderByDesc('id')->first();
    }

    public function findWhere(array $conditions, bool $isWithTrashed = false): mixed
    {
        return $isWithTrashed
            ? $this->model->withTrashed()->where($conditions)->get()
            : $this->model->where($conditions)->get();
    }

    public function findWhereFirst(array $conditions, bool $isWithTrashed = false): mixed
    {
        return $isWithTrashed
            ? $this->model->withTrashed()->where($conditions)->first()
            : $this->model->where($conditions)->first();
    }

    public function findWhereWith(array $conditions, array $relations, bool $isWithTrashed = false): mixed
    {
        return $isWithTrashed
            ? $this->model->withTrashed()->where($conditions)->with($relations)->get()
            : $this->model->where($conditions)->with($relations)->get();
    }

    public function getTableName()
    {
        return $this->model->getTable();
    }

    public function getWithOrderBy(string $filed, string $order, bool $isWithTrashed = false)
    {
        return $isWithTrashed
            ? $this->model->withTrashed()->orderBy($filed, $order)->get()
            : $this->model->orderBy($filed, $order)->get();
    }

    public function filter(?array $relations = null, ?string $orderByField = null)
    {
        $query = $this->model->query();

        if ($relations) {
            $query->with($relations);
        }
        if ($orderByField) {
            $query->orderBy($orderByField);
        }

        return $query->get();
    }

    public function firstWhereWith(array $params, array $relations)
    {
        return $this->model->where($params)->with($relations)->first();
    }

    /**
     * @param array $params Contains variable query arguments
     * @param bool $isWithTrashed
     * @return bool
     */
    public function whereExists(array $params, bool $isWithTrashed = false): bool
    {
        return $isWithTrashed
            ? $this->model->withTrashed()->where($params)->exists()
            : $this->model->where($params)->exists();
    }

    public function forcedDelete(int $id): bool
    {
        return $this->model->find($id)->forceDelete();
    }

    public function getWhereIn(string $column, array $params, bool $isWithTrashed = false): object
    {
        return $isWithTrashed
            ? $this->model->withTrashed()->whereIn($column, $params)->get()
            : $this->model->whereIn($column, $params)->get();
    }
}
