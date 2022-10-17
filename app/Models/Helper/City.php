<?php

namespace App\Models\Helper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasFactory;
    use HasTranslations;

    public $timestamps = false;

    protected $fillable = ['name'];
    public $translatable = ['name'];
}
