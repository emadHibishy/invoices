<?php

namespace App\Models;

use App\Models\Helper\City;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Customer extends Model
{
    use HasFactory;
    use HasTranslations;

    public CONST PREFIX = 'CUST-';
    public CONST LENGTH = 10;
    protected $guarded = [];
    public $translatable = ['name'];

    public function territory()
    {
        return $this->belongsTo(Territory::class, 'territory_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
