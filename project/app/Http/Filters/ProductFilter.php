<?php

namespace App\Http\Filters;
use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const MAX_PRICE = 'max_price';
    public const MIN_PRICE = 'min_price';
    public const MANUFACTURER = 'manufacturer';
    public const ORDER_DATE = 'order_date';
    public const ORDER_PRICE = 'order_price';



    protected function getCallbacks(): array
    {
        return [
            self::MAX_PRICE => [$this, 'max_price'],
            self::MIN_PRICE => [$this, 'min_price'],
            self::MANUFACTURER => [$this, 'manufacturer'],
            self::ORDER_DATE => [$this, 'order_date'],
            self::ORDER_PRICE => [$this, 'order_price'],
        ];
    }

    public function min_price(Builder $builder, $value)
    {
        $builder->where('price', '>', $value);
    }
    public function max_price(Builder $builder, $value)
    {
        $builder->where('price', '<', $value);
    }

    public function manufacturer(Builder $builder, $value)
    {
        $builder->where('manufacturer_id', $value);
    }

    public function order_price(Builder $builder)
    {
        $builder->where('id','>',0)->orderBy('price');
    }

    public function order_date(Builder $builder)
    {
        $builder->where('id','>',0)->orderByDesc('created_at');
    }
}
