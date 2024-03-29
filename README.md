# A package for importing the nutrients table from matportalen.no into a Laravel model


## How to use it
Copy the package content to a folder in your project with the following path:
packages/krmoller/matvaretabell-laravel

Add the following to the root composer.json:
```json
"repositories": {
    "matvaretabell-laravel": {
        "type": "path",
        "url": "packages/krmoller/matvaretabell-laravel",
        "options": {
            "symlink": true
        }
    }
},
```

Run ```composer update```


Publish the config file:
```
php artisan vendor:publish --provider="Krmoller\Matvaretabell\MatvaretabellServiceProvider"
```

In the config file you can set up the columns to import from the file.

Use it in your app:
```php
use Krmoller\Matvaretabell\Matvaretabell;

function importTable() : array
{
    $inputFileName = Storage::path('public/matvarer.xlsx');
    return Matvaretabell::ImportToDB($inputFileName);

}
```

If you only want an array with the data without importing it into the database:
```php
use Krmoller\Matvaretabell\Matvaretabell;

function importTable() : array
{
    $inputFileName = Storage::path('public/matvarer.xlsx');
    return Matvaretabell::getFoods($inputFileName);

}
```

