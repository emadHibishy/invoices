<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Territory extends Model
{
    use HasFactory;
    use HasTranslations;

    public $timestamps = false;

    protected $fillable = ['name', 'abbreviation'];
    public $translatable = ['name'];
}
