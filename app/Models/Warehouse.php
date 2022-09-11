<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Warehouse extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = ['code', 'name', 'description'];
    public $translatable = ['name', 'description'];
}
