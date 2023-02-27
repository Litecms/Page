<?php


return  
    [
        'model' => [
            'model' => \Litecms\Page\Models\Page::class,
            'table' => 'litecms_page_pages',
            'hidden'=> [],
            'visible' => [],
            'guarded' => ['*'],
            'slugs' => ['slug' => 'name'],
            'dates' => ['deleted_at', 'created_at', 'updated_at'],
            'appends' => [],
            'fillable' => ['name',  'title',  'heading',  'sub_heading',  'abstract',  'content',  'meta_title',  'meta_keyword',  'meta_description',  'banner',  'images',  'compile',  'view',  'category',  'order',  'status'],
            'translatables' => [],
            'upload_folder' => 'page/page',
            'uploads' => [
            /*
                    'images' => [
                        'count' => 10,
                        'type'  => 'image',
                    ],
                    'file' => [
                        'count' => 1,
                        'type'  => 'file',
                    ],
            */
            ],

            'casts' => [
            
            /*
                'images'    => 'array',
                'file'      => 'array',
            */
            ],

            'revision' => [],
            'perPage' => '20',
            'search'        => [
                'name'  => 'like',
                'status',
            ]
        ],

        'search' => [
            
        ],

        'list' => [
            "name" => [
                "key" => "name", 
                "type" => "text", 
                "label" => 'page::page.label.name', 
                'sort' => true,
                'roles' => [],
            ],
            "title" => [
                "key" => "title", 
                "type" => "text", 
                "label" => 'page::page.label.title', 
                'sort' => true,
                'roles' => [],
            ],
            "compile" => [
                "key" => "compile", 
                "type" => "text", 
                "label" => 'page::page.label.compile', 
                'sort' => true,
                'roles' => [],
            ],
            "view" => [
                "key" => "view", 
                "type" => "text", 
                "label" => 'page::page.label.view', 
                'sort' => true,
                'roles' => [],
            ],
            "category" => [
                "key" => "category", 
                "type" => "text", 
                "label" => 'page::page.label.category', 
                'sort' => true,
                'roles' => [],
            ],
            "order" => [
                "key" => "order", 
                "type" => "text", 
                "label" => 'page::page.label.order', 
                'sort' => true,
                'roles' => [],
            ],
            "slug" => [
                "key" => "slug", 
                "type" => "text", 
                "label" => 'page::page.label.slug', 
                'sort' => true,
                'roles' => [],
            ],
            "status" => [
                "key" => "status", 
                "type" => "text", 
                "label" => 'page::page.label.status', 
                'sort' => true,
                'roles' => [],
            ],
        ],

        'form' => [
            'name' => [
                "element" => 'text',
                "type" => 'text',
                "label" => 'page::page.label.name',
                "placeholder" => 'page::page.placeholder.name',
                "required" => 'true',
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'title' => [
                "element" => 'text',
                "type" => 'text',
                "label" => 'page::page.label.title',
                "placeholder" => 'page::page.placeholder.title',
                "required" => 'true',
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'heading' => [
                "element" => 'text',
                "type" => 'text',
                "label" => 'page::page.label.heading',
                "placeholder" => 'page::page.placeholder.heading',
                "required" => 'true',
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'sub_heading' => [
                "element" => 'text',
                "type" => 'text',
                "label" => 'page::page.label.sub_heading',
                "placeholder" => 'page::page.placeholder.sub_heading',
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'abstract' => [
                "element" => 'textarea',
                "type" => 'textarea',
                "label" => 'page::page.label.abstract',
                "placeholder" => 'page::page.placeholder.abstract',
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'content' => [
                "element" => 'html_editor',
                "type" => 'html_editor',
                "label" => 'page::page.label.content',
                "placeholder" => 'page::page.placeholder.content',
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "12",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'meta_title' => [
                "element" => 'text',
                "type" => 'text',
                "label" => 'page::page.label.meta_title',
                "placeholder" => 'page::page.placeholder.meta_title',
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'meta_keyword' => [
                "element" => 'text',
                "type" => 'text',
                "label" => 'page::page.label.meta_keyword',
                "placeholder" => 'page::page.placeholder.meta_keyword',
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'meta_description' => [
                "element" => 'text',
                "type" => 'text',
                "label" => 'page::page.label.meta_description',
                "placeholder" => 'page::page.placeholder.meta_description',
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'banner' => [
                "element" => 'file',
                "type" => 'image',
                "label" => 'page::page.label.banner',
                "placeholder" => 'page::page.placeholder.banner',
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "12",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'images' => [
                "element" => 'file',
                "type" => 'images',
                "label" => 'page::page.label.images',
                "placeholder" => 'page::page.placeholder.images',
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "12",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'compile' => [
                "element" => 'switch',
                "type" => 'switch',
                "label" => 'page::page.label.compile',
                "placeholder" => 'page::page.placeholder.compile',
                "rules" => '',
                "options" => function(){
                    return [];
                },
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'view' => [
                "element" => 'select',
                "type" => 'select',
                "label" => 'page::page.label.view',
                "placeholder" => 'page::page.placeholder.view',
                "rules" => '',
                "options" => function(){
                    return [];
                },
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'category' => [
                "element" => 'model_select',
                "type" => 'model_select',
                "label" => 'page::page.label.category',
                "placeholder" => 'page::page.placeholder.category',
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'order' => [
                "element" => 'numeric',
                "type" => 'numeric',
                "label" => 'page::page.label.order',
                "placeholder" => 'page::page.placeholder.order',
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
        ],

        'urls' => [
            'new' => [
                'url' => 'page/page/new',
                'method' => 'GET',
            ],
            'create' => [
                'url' => 'page/page/create',
                'method' => 'GET',
            ],
            'store' => [
                'url' => 'page/page',
                'method' => 'POST',
            ],
            'update' => [
                'url' => 'page/page',
                'method' => 'PUT',
            ],
            'list' => [
                'url' => 'page/page',
                'method' => 'GET',
            ],
            'delete' => [
                'url' => 'page/page',
                'method' => 'DELETE',
            ],
        ],
        'order' => [
            'created_at' => 'page::page.label.created_at',
            'name' => 'page::page.label.name',
            'status' => 'page::page.label.status',
        ],
        'groups' => [
            'main' => 'page::page.groups.main',
            'details' => 'page::page.groups.details',
            'images' => 'page::page.groups.images',
            'settings' => 'page::page.groups.settings',
        ],
        'controller' => [
            'provider' => 'Litecms',
            'package' => 'Page',
            'module' => 'Page',
        ],

        
        
    ];
