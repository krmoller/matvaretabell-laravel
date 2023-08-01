<?php

return [
    'model' => 'App\Models\Food',
    'properties' => [
        'type' => 'global',
        'source_id' => '1',
        'source_type' => 'App\Models\App'
    ],
    // match the column name in the xlsx file with the model property names.
    // the ones listed here is also the ones that will be extracted from the file.
    'columns' => [
        'MatvareID' => 'matvare_id',
        'Matvare' => 'matvare',
        'Spiselig del' => 'spiselig',
        'Vann' => 'vann',
        'Kilojoule' => 'kilojoule',
        'Kilokalorier' => 'kilokalorier',
        'Fett' => 'fett',
        'Mettet' => 'mettet',
        'Trans' => 'trans',
        'Enumettet' => 'enumettet',
        'Flerumettet' => 'flerumettet',
        'Omega-3' => 'omega_3',
        'Omega-6' => 'omega_6',
        'Kolesterol' => 'kolesterol',
        'Karbohydrat' => 'karbohydrat',
        'Stivelse' => 'stivelse',
        'Mono+disakk' => 'monodisakk',
        'Sukker, tilsatt' => 'sukker_tilsatt',
        'Kostfiber' => 'kostfiber',
        'Protein' => 'protein',
        'Salt' => 'salt',
        'Alkohol' => 'alkohol',
        'Vitamin A' => 'vitamin_a',
        'Retinol' => 'retinol',
        'Beta-karoten' => 'beta_karoten',
        'Vitamin D' => 'vitamin_d',
        'Vitamin E' => 'vitamin_e',
        'Tiamin' => 'tiamin',
        'Riboflavin' => 'riboflavin',
        'Niacin' => 'niacin',
        'Vitamin B6' => 'vitamin_b6',
        'Folat' => 'folat',
        'Vitamin B12' => 'vitamin_b12',
        'Vitamin C' => 'vitamin_c',
        'Kalsium' => 'kalsium',
        'Jern' => 'jern',
        'Natrium' => 'natrium',
        'Kalium' => 'kalium',
        'Magnesium' => 'magnesium',
        'Sink' => 'sink',
        'Selen' => 'selen',
        'Kopper' => 'kopper',
        'Fosfor' => 'fosfor',
        'Jod' => 'jod'
    ]
];
