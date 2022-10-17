<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PaymentTerm extends Model
{
    use HasFactory;
    use HasTranslations;

    public $timestamps = false;
    protected $fillable = ['name', 'description', 'days'];
    public $translatable = ['name', 'description'];
}
