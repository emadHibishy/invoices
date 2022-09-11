<?php

namespace App\Models;

use App\Models\Helper\UOM;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable    = ['name', 'notes'];
    protected $fillable     = [
        'name',
        'price',
        'category_id',
        'uom_id',
        'notes'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function UOM()
    {
        return $this->belongsTo(UOM::class, 'uom_id');
    }
}
