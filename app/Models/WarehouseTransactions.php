<?php

namespace App\Models;

use App\Models\Helper\TransactionsTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class WarehouseTransactions extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $guarded = [];
    public $translatable = ['notes'];
    public const LENGTH = 20;

    public function transaction_type()
    {
        return $this->belongsTo(TransactionsTypes::class, 'transaction_type_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
