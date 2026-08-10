<?php

namespace App\Http\Controllers\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

trait HandlesOutsourceCategories
{
    protected function outsourceCategoryQuery(string $modelClass): Builder
    {
        $table = (new $modelClass())->getTable();

        if (!Schema::hasTable($table)) {
            return $modelClass::query()->whereRaw('0 = 1');
        }

        $query = $modelClass::query();

        if (Schema::hasColumn($table, 'sort_order')) {
            $query->orderBy('sort_order');
        }

        return $query->orderBy('id');
    }

    protected function applyOutsourceCategoryStatusFilter(Builder $query, string $modelClass, Request $request): Builder
    {
        if ($request->status === 'All' || $request->status === null) {
            return $query;
        }

        $table = (new $modelClass())->getTable();

        if (Schema::hasColumn($table, 'status')) {
            $status = $request->status == 2 ? 0 : $request->status;
            $query->where('status', $status);
        }

        return $query;
    }

    protected function applyOutsourceCategoryOptionalFields(Model $model, Request $request): void
    {
        $table = $model->getTable();

        if (Schema::hasColumn($table, 'sort_order')) {
            $model->sort_order = $request->input('sort_order', 0);
        }

        if (Schema::hasColumn($table, 'status')) {
            $model->status = $request->input('status', '1');
        }
    }

    protected function getActiveOutsourceCategories(string $modelClass)
    {
        $table = (new $modelClass())->getTable();

        if (!Schema::hasTable($table)) {
            return collect();
        }

        $query = $modelClass::query();

        if (Schema::hasColumn($table, 'status')) {
            $query->where('status', 1);
        }

        if (Schema::hasColumn($table, 'sort_order')) {
            $query->orderBy('sort_order');
        }

        return $query->orderBy('id')->get();
    }

    protected function findActiveOutsourceCategory(string $modelClass, $id)
    {
        $table = (new $modelClass())->getTable();

        if (!Schema::hasTable($table)) {
            abort(404);
        }

        $query = $modelClass::query()->where('id', $id);

        if (Schema::hasColumn($table, 'status')) {
            $query->where('status', 1);
        }

        return $query->firstOrFail();
    }
}
