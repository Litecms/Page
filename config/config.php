<?php

return [

    /**
     * Provider.
     */
    'provider' => 'litecms',

    /*
     * Package.
     */
    'package' => 'page',

    /*
     * Modules.
     */
    'modules' => ['page'],

    'page' => [
        'model' => [
            'model' => \Litecms\Page\Models\Page::class,
            'repository' => \Litecms\Page\Repositories\Eloquent\PageRepository::class,
            'table' => 'pages',
            'hidden' => [],
            'visible' => [],
            'guarded' => ['*'],
            'slugs' => ['slug' => 'name'],
            'dates' => ['deleted_at', 'createdat', 'updated_at'],
            'appends' => [],
            'fillable' => ['id', 'name', 'title', 'heading', 'sub_heading', 'abstract', 'content',
                'meta_title', 'meta_keyword', 'meta_description', 'banner', 'images', 'compile',
                'view', 'category', 'order', 'slug', 'status', 'upload_folder', 'deleted_at',
                'created_at', 'updated_at'],
            'translatable' => ['name', 'title', 'heading', 'meta_title', 'content', 'meta_keyword', 'meta_description'],
            'upload_folder' => 'page/page',
            'uploads' => [
                'images' => [
                    'count' => 10,
                    'type' => 'banner',
                ],
                'banner' => [
                    'count' => 1,
                    'type' => 'file',
                ],

            ],

            'casts' => [
                'images' => 'array',
                'banner' => 'array',
                'updated_at' => 'datetime:Y-m-d h:i:s',
                'created_at' => 'datetime:Y-m-d h:i:s',
            ],

            'revision' => [],
            'perPage' => '20',
            'search' => [
                'name' => 'like',
                'status',
            ],
        ],

        'controller' => [
            'provider' => 'Litecms',
            'package' => 'Page',
            'module' => 'Page',
        ],
    ],
];
