<?php

namespace App\Models\Helper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class UOM extends Model
{
    use HasFactory;
    use HasTranslations;

    public $timestamps = false;

    protected $table = 'unit_of_measures';
    protected $fillable = ['uom_code', 'uom_name'];
    public $translatable = ['uom_name'];
}
