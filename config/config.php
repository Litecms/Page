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
 * Compilers .
 */
    'compiler' => ['none' => 'None', 'php' => 'Php', 'blade' => 'Blade', 'twig' => 'Twig'],

/*
 * Views for the page  .
 */
    'views'    => ['page' => 'Default', 'left' => 'Left side menu'],

    'image'    => [
        'xs' => ['width' => '60', 'height' => '45', 'action' => 'resize', 'default' => 'images/noimage.jpg', 'watermark' => 'images/logo/default.png'],
        'sm' => ['width' => '160', 'height' => '75', 'action' => 'resize', 'default' => 'images/noimage.jpg', 'watermark' => 'images/logo/default.png'],
        'md' => ['width' => '460', 'height' => '345', 'action' => 'resize', 'default' => 'images/noimage.jpg', 'watermark' => 'images/logo/default.png'],
        'lg' => ['width' => '800', 'height' => '600', 'action' => 'resize', 'default' => 'images/noimage.jpg', 'watermark' => 'images/logo/default.png'],
        'xl' => ['width' => '1000', 'height' => '750', 'action' => 'resize', 'default' => 'images/noimage.jpg', 'watermark' => 'images/logo/default.png'],
    ],

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
        'fillable'     => ['heading', 'meta_title', 'name', 'slug', 'order', 'view', 'compiler', 'status', 
                           'upload_folder', 'content', 'meta_keyword', 'meta_description', 'abstract'],
        'translate'    => ['name', 'heading', 'content', 'meta_title', 'meta_keyword', 'meta_description'],
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
