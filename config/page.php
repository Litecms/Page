<?php

return
    [
    'model' => [
        'model' => \Litecms\Page\Models\Page::class,
        'table' => 'litecms_page_pages',
        'hidden' => [],
        'visible' => [],
        'guarded' => ['*'],
        'slugs' => ['slug' => 'name'],
        'dates' => ['deleted_at', 'created_at', 'updated_at'],
        'appends' => [],
        'fillable' => ['name', 'title', 'heading', 'sub_heading', 'abstract', 'content', 'meta_title', 'meta_keyword', 'meta_description', 'banner', 'images', 'compile', 'view', 'category', 'order', 'status'],
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
        'search' => [
            'name' => 'like',
            'status',
        ],
    ],

    'search' => [

    ],

    'list' => [
        [
            "key" => "name",
            "type" => "text",
            "label" => 'page::page.label.name',
            'sort' => true,
            'roles' => [],
        ],
        [
            "key" => "title",
            "type" => "text",
            "label" => 'page::page.label.title',
            'sort' => true,
            'roles' => [],
        ],
        [
            "key" => "compile",
            "type" => "text",
            "label" => 'page::page.label.compile',
            'sort' => true,
            'roles' => [],
        ],
        [
            "key" => "view",
            "type" => "text",
            "label" => 'page::page.label.view',
            'sort' => true,
            'roles' => [],
        ],
        [
            "key" => "category",
            "type" => "text",
            "label" => 'page::page.label.category',
            'sort' => true,
            'roles' => [],
        ],
        [
            "key" => "order",
            "type" => "text",
            "label" => 'page::page.label.order',
            'sort' => true,
            'roles' => [],
        ],
        [
            "key" => "slug",
            "type" => "text",
            "label" => 'page::page.label.slug',
            'sort' => true,
            'roles' => [],
        ],
        [
            "key" => "status",
            "type" => "text",
            "label" => 'page::page.label.status',
            'sort' => true,
            'roles' => [],
        ],
    ],

    'form' => [
        [
            "key" => 'name',
            "element" => 'text',
            "type" => 'text',
            "label" => 'page::page.label.name',
            "placeholder" => 'page::page.placeholder.name',
            "required" => 'true',
            "group" => "main.main",
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
        [
            "key" => 'slug',
            "element" => 'text',
            "type" => 'text',
            "label" => 'page::page.label.slug',
            "placeholder" => 'page::page.placeholder.slug',
            "required" => 'true',
            "group" => "main.main",
            "section" => "first",
            "col" => "6",
            "append" => '.html',
            "prepend" => null,
            "roles" => [],
            "attributes" => [
                'wrapper' => [],
                "label" => [],
                "element" => [],

            ],
        ],
        [
            "key" => 'title',
            "element" => 'text',
            "type" => 'text',
            "label" => 'page::page.label.title',
            "placeholder" => 'page::page.placeholder.title',
            "required" => 'true',
            "group" => "main.main",
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
        [
            "key" => 'heading',
            "element" => 'text',
            "type" => 'text',
            "label" => 'page::page.label.heading',
            "placeholder" => 'page::page.placeholder.heading',
            "required" => 'true',
            "group" => "main.main",
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
        [
            "key" => 'sub_heading',
            "element" => 'text',
            "type" => 'text',
            "label" => 'page::page.label.sub_heading',
            "placeholder" => 'page::page.placeholder.sub_heading',
            "group" => "main.main",
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
        [
            "key" => 'abstract',
            "element" => 'textarea',
            "type" => 'textarea',
            "label" => 'page::page.label.abstract',
            "placeholder" => 'page::page.placeholder.abstract',
            "group" => "main.main",
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
        [
            "key" => 'content',
            "element" => 'html_editor',
            "type" => 'html_editor',
            "label" => 'page::page.label.content',
            "placeholder" => 'page::page.placeholder.content',
            "group" => "main.main",
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
        [
            "key" => 'meta_title',
            "element" => 'text',
            "type" => 'text',
            "label" => 'page::page.label.meta_title',
            "placeholder" => 'page::page.placeholder.meta_title',
            "group" => "main.meta",
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
        [
            "key" => 'meta_keyword',
            "element" => 'text',
            "type" => 'text',
            "label" => 'page::page.label.meta_keyword',
            "placeholder" => 'page::page.placeholder.meta_keyword',
            "group" => "main.meta",
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
        [
            "key" => 'meta_description',
            "element" => 'textarea',
            "type" => 'text',
            "label" => 'page::page.label.meta_description',
            "placeholder" => 'page::page.placeholder.meta_description',
            "group" => "main.meta",
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
        [
            "key" => 'banner',
            "element" => 'file',
            "type" => 'image',
            "label" => 'page::page.label.banner',
            "placeholder" => 'page::page.placeholder.banner',
            "group" => "main.images",
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
        [
            "key" => 'images',
            "element" => 'file',
            "type" => 'images',
            "label" => 'page::page.label.images',
            "placeholder" => 'page::page.placeholder.images',
            "group" => "main.images",
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
        [
            "key" => 'compile',
            "element" => 'switch',
            "type" => 'switch',
            "label" => 'page::page.label.compile',
            "placeholder" => 'page::page.placeholder.compile',
            "options" => function () {
                return trans('page::page.options.compile');
            },
            "group" => "main.settings",
            "section" => "first",
            "col" => "2",
            "append" => null,
            "prepend" => null,
            "roles" => [],
            "attributes" => [
                'wrapper' => [],
                "label" => [],
                "element" => [],

            ],
        ],
        [
            "key" => 'view',
            "element" => 'select',
            "type" => 'select',
            "label" => 'page::page.label.view',
            "placeholder" => 'page::page.placeholder.view',
            "options" => function () {
                return trans('page::page.options.view');
            },
            "group" => "main.settings",
            "section" => "first",
            "col" => "5",
            "append" => null,
            "prepend" => null,
            "roles" => [],
            "attributes" => [
                'wrapper' => [],
                "label" => [],
                "element" => [],

            ],
        ],
        [
            "key" => 'order',
            "element" => 'numeric',
            "type" => 'numeric',
            "label" => 'page::page.label.order',
            "placeholder" => 'page::page.placeholder.order',
            "group" => "main.settings",
            "section" => "first",
            "col" => "5",
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
        [
            'icon' => "mdi:account-supervisor-outline",
            'name' => "page::page.groups.main",
            'group' => "main.main",
            'title' => "page::page.groups.main",
        ],
        [
            'icon' => "fe:home",
            'name' => "page::page.groups.meta",
            'group' => "main.meta",
            'title' => "page::page.groups.meta",
        ],
        [
            'icon' => "fe:home",
            'name' => "page::page.groups.images",
            'group' => "main.images",
            'title' => "page::page.groups.images",
        ],
        [
            'icon' => "fe:home",
            'name' => "page::page.groups.settings",
            'group' => "main.settings",
            'title' => "page::page.groups.settings",
        ],
    ],
    'controller' => [
        'provider' => 'Litecms',
        'package' => 'Page',
        'module' => 'Page',
    ],

];
