<?php

namespace krmoller\matvaretabell;

use Illuminate\Support\Facades\DB;

class DbImport
{

    public static function import(array $foods) : array
    {
        foreach ($foods as $food) {
           self::update($food);
        }

        return $foods;
    }

    private static function update(array $food)
    {
        $model = config('matvaretabell.model');
        $food['type'] = 'global';
        $food['source_id'] = 1;
        $food['source_type'] = 'App\Models\App';
//        $food['updated_at'] = date('Y-m-d h:i:s');

        return $model::updateOrInsert(
                ['matvare_id' => $food['matvare_id']],
                $food);
    }

}
