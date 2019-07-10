<?php

return [

/*
 * Provider .
 */
    'provider' => 'litecms',

/*
 * Package .
 */
    'package'  => 'page',

/*
 * Modules .
 */
    'modules'  => ['page', 'category'],


/*
 * Views for the page  .
 */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

// Modale variables for page module.
    'page'     => [
        'model'        => 'Litecms\Page\Models\Page',
        'table'        => 'pages',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'slugs'        => ['slug' => 'name'],
        'dates'        => ['deleted_at'],
        'fillable'     => ['heading', 'meta_title', 'name', 'slug', 'order', 'view', 'compile', 'status', 'upload_folder', 'content', 'meta_keyword', 'meta_description', 'abstract'],
        'translatable'    => ['name', 'heading', 'content', 'meta_title', 'meta_keyword', 'meta_description'],
        'upload_folder' => '/page/page',
        'uploads'      => [
            'banner' => [
                'count' => 1,
                'type'  => 'image',
            ],
            'images' => [
                'count' => 10,
                'type'  => 'image',
            ],
        ],
        'casts'        => [
            'banner' => 'array',
            'images' => 'array',
        ],
        'encrypt'      => ['id'],
        'revision'     => ['name', 'title'],
        'perPage'      => '20',
        'search'        => [

            'name'  => 'like',
            'title'  => 'like',
            'heading'  => 'like',
            'slug'  => 'like',
            'order'  => 'like'
        ],
    ],
];
