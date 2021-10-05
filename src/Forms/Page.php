<?php

namespace Litecms\Page\Forms;

use Litepie\Form\FormInterpreter;

class Page extends FormInterpreter
{

    /**
     * Sets the form and form elements.
     * @return null.
     */
    public static function setAttributes()
    {

        self::$urls = [
            'new' => [
                'url' => guard_url('page/page/new'),
                'method' => 'GET',
            ],
            'create' => [
                'url' => guard_url('page/page/create'),
                'method' => 'GET',
            ],
            'store' => [
                'url' => guard_url('page/page'),
                'method' => 'POST',
            ],
            'update' => [
                'url' => guard_url('page/page'),
                'method' => 'PUT',
            ],
            'list' => [
                'url' => guard_url('page/page'),
                'method' => 'GET',
            ],
            'delete' => [
                'url' => guard_url('page/page'),
                'method' => 'DELETE',
            ],
        ];
        self::$search = [
            'name' => [
                "type" => 'text',
                "label" => trans('page::page.label.name'),
                "placeholder" => trans('page::page.placeholder.name'),
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "4",
                "roles" => [],
            ]
        ];
        self::$orderBy = [
            'created_at' => trans('blog::blog.label.created_at'),
            'name' => trans('blog::blog.label.title'),
            'status' => trans('blog::blog.label.status'),
        ];
        self::$groups = [
            'main' => trans('page::page.groups.main'),
            'details' => trans('page::page.groups.details'),
            'images' => trans('page::page.groups.images'),
            'settings' => trans('page::page.groups.settings'),
        ];
        self::$list = [
            [
                'key' => "ref",
                'label' => trans('page::page.label.ref'),
                'sortable' => 'true',
                'roles' => [],
            ],
            [
                'key' => "id",
                'label' => trans('page::page.label.id'),
                'sortable' => 'true',
                'roles' => [],
            ],
            [
                'key' => "name",
                'label' => trans('page::page.label.name'),
                'sortable' => 'true',
                'roles' => [],
            ],
            [
                'key' => "status",
                'label' => trans('page::page.label.status'),
                'sortable' => 'true',
                'roles' => [],
            ],
        ];
        self::$fields = [
                'name' => [
                "element" => 'text',
                "type" => 'text',
                "label" => trans('page::page.label.name'),
                "placeholder" => trans('page::page.placeholder.name'),
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
            'title' => [
                "element" => 'text',
                "type" => 'text',
                "label" => trans('page::page.label.title'),
                "placeholder" => trans('page::page.placeholder.title'),
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
            'heading' => [
                "element" => 'text',
                "type" => 'text',
                "label" => trans('page::page.label.heading'),
                "placeholder" => trans('page::page.placeholder.heading'),
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
                "label" => trans('page::page.label.sub_heading'),
                "placeholder" => trans('page::page.placeholder.sub_heading'),
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
                "label" => trans('page::page.label.abstract'),
                "placeholder" => trans('page::page.placeholder.abstract'),
                "rules" => '',
                "group" => "details",
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
            'content' => [
                "element" => 'html_editor',
                "type" => 'html_editor',
                "label" => trans('page::page.label.content'),
                "placeholder" => trans('page::page.placeholder.content'),
                "rules" => '',
                "group" => "details",
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
                "label" => trans('page::page.label.meta_title'),
                "placeholder" => trans('page::page.placeholder.meta_title'),
                "rules" => '',
                "group" => "details",
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
                "label" => trans('page::page.label.meta_keyword'),
                "placeholder" => trans('page::page.placeholder.meta_keyword'),
                "rules" => '',
                "group" => "details",
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
                "label" => trans('page::page.label.meta_description'),
                "placeholder" => trans('page::page.placeholder.meta_description'),
                "rules" => '',
                "group" => "details",
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
            'banner' => [
                "element" => 'file',
                "type" => 'image',
                "label" => trans('page::page.label.banner'),
                "placeholder" => trans('page::page.placeholder.banner'),
                "rules" => '',
                "group" => "images",
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
                "label" => trans('page::page.label.images'),
                "placeholder" => trans('page::page.placeholder.images'),
                "rules" => '',
                "group" => "images",
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
                "element" => 'numeric',
                "type" => 'numeric',
                "label" => trans('page::page.label.compile'),
                "placeholder" => trans('page::page.placeholder.compile'),
                "rules" => '',
                "group" => "settings",
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
                "element" => 'text',
                "type" => 'text',
                "label" => trans('page::page.label.view'),
                "placeholder" => trans('page::page.placeholder.view'),
                "rules" => '',
                "group" => "settings",
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
                "element" => 'select',
                "type" => 'select',
                "label" => trans('page::page.label.category'),
                "placeholder" => trans('page::page.placeholder.category'),
                "rules" => '',
                "group" => "settings",
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
                "label" => trans('page::page.label.order'),
                "placeholder" => trans('page::page.placeholder.order'),
                "rules" => '',
                "group" => "settings",
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
        ];

        return new static();
    }
}