<?php

namespace App\Helpers;
use Illuminate\Database\Eloquent\Model;

class Helper
{

    private static function getLastId($model)
    {
        $lastRecord = $model::orderByDesc('id')->first('id');
        return is_null($lastRecord) ? 0 : $lastRecord->id;
    }

    public static function serializa($prefix, $model , $length = 20)
    {
        $lastId = self::getLastId($model);
        $lastId++;
        $len = $length - strlen( $prefix . $lastId );

        return $prefix . str_repeat('0', $len) . $lastId;
    }
}
