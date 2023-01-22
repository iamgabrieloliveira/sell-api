<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Sell
 *
 * @property int $sell_id
 * @property int $value
 * @property int $seller_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Sell newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sell newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sell query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sell whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sell whereSellId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sell whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sell whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sell whereValue($value)
 * @mixin Eloquent
 */
class Sell extends Model
{
    use HasFactory;

    protected $table = 'sell';

    protected $primaryKey = 'sell_id';

    public function getSellerCommission(): int|float
    {
        return (config('sell.seller.commission_percentage') * $this->getOriginalValue()) / 100;
    }

    public function getOriginalValue(): int|float
    {
        return $this->value / 100;
    }
}
