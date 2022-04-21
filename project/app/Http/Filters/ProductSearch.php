<?php

namespace App\Http\Filters;
use Illuminate\Database\Eloquent\Builder;

class ProductSearch extends AbstractFilter
{
    public const SEARCH = 'search';

    protected function getCallbacks(): array
    {
        return [
            self::SEARCH => [$this, 'search'],
        ];
    }

    public function search(Builder $builder, $value)
    {
        $builder->where('name', 'LIKE', "%{$value}%");
    }
}
