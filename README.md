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


Publish the config files:
```
php artisan vendor:publish --provider="Krmoller\Matvaretabell\MatvaretabellServiceProvider"
```


