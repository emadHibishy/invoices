<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory;
    use HasTranslations;


    public $timestamps = false;

    protected $fillable = ['category_name','description'];
    public $translatable = ['category_name','description'];

    public function product()
    {
        return $this->hasMany(Product::class,'category_id');
    }
}
