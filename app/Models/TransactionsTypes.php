<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TransactionsTypes extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = ['type_name', 'value'];
    public $translatable = ['type_name'];
}
