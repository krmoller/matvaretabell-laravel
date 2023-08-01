<?php

namespace krmoller\matvaretabell;

use Illuminate\Support\Facades\DB;

class DbImport
{

    // Imports the file into the database
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
        $updateOrInsertArg = config('matvaretabell.properties');
        $updateOrInsertArg['matvare_id'] = $food['matvare_id'];
        foreach (config('matvaretabell.properties') as $key => $value) {
            $food[$key] = $value;
        }

        return $model::updateOrInsert(
                $updateOrInsertArg,
                $food);
    }

}
