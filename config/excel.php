<?php

return [
    'exports' => [
        'storage_path' => storage_path('app/exports'),
    ],
    'imports' => [
        'read_only' => true,
        'heading_row' => [
            'formatter' => 'slug',
        ],
    ],
    'extension_detector' => [
        'xlsx' => 'Xlsx',
        'xls'  => 'Xls',
        'csv'  => 'Csv',
    ],
];