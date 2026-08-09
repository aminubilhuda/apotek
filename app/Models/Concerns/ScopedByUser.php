<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait ScopedByUser
{
    protected static function bootScopedByUser(): void
    {
        $scope = function (Builder $builder) {
            $user = Auth::user();

            if ($user === null || $user->isAdmin()) {
                return;
            }

            $builder->where('id_user', $user->id);
        };

        static::addGlobalScope('userScope', $scope);

        static::creating(function ($model) {
            $user = Auth::user();

            if ($user === null || $user->isAdmin()) {
                return;
            }

            if ($model->id_user === null) {
                $model->id_user = $user->id;
            }
        });
    }
}
