<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Organization;

trait AdminTrait
{

    protected static function bootAdminTrait()
    {

        static::addGlobalScope('user_id', function (Builder $builder) {
            $isAdmin = auth()->user()->role->title;

            if (auth()->check()) {
                if ($isAdmin != 'Admin') {
                    return $builder->where('user_id', auth()->user()->id);
                }
            }
        });
    }
}
