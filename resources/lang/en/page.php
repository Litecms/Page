<?php

return [
    'name'        => 'Page',
    'names'       => 'Pages',
    'options'     => [
        'view' => ['default' => 'Default', 'left' => 'Left Menu', 'right' => 'Right Menu'],
        'compile' => ['0' => 'No', '1' => 'Yes'],
        'status' => ['0' => 'Hide', '1' => 'Show'],
        'category' => ['default' => 'Default'],
    ],
    'label'       => [
        'name'             => 'Name',
        'title'            => 'Title',
        'heading'          => 'Heading',
        'sub_heading'      => 'Sub heading',
        'abstract'         => 'Abstract',
        'content'          => 'Content',
        'meta_title'       => 'Meta title',
        'meta_keyword'     => 'Meta keyword',
        'meta_description' => 'Meta description',
        'banner'           => 'Banner',
        'images'           => 'Images',
        'compile'          => 'Compile',
        'view'             => 'View',
        'order'            => 'Order',
        'status'           => 'Status',
        'status'           => 'Status',
        'keyword'          => 'Keyword',
        'description'      => 'Description',
        'slug'             => 'Slug',
        'url'              => 'Url',
        'created_at'       => 'Created at',
        'updated_at'       => 'Updated at',
        'category_id'      => 'Category',
    ],
    'placeholder' => [
        'name'             => 'Please enter name',
        'title'            => 'Please enter title',
        'description'      => 'Please enter description',
        'heading'          => 'Please enter heading',
        'sub_heading'      => 'Please enter sub heading',
        'abstract'         => 'Please enter abstract / summary text for the page',
        'content'          => 'Please enter content',
        'meta_title'       => 'Please enter meta title',
        'meta_keyword'     => 'Please enter meta keyword',
        'meta_description' => 'Please enter meta description',
        'banner'           => 'Please enter banner',
        'images'           => 'Please enter images',
        'compile'          => 'Please select compile',
        'view'             => 'Please select view',
        'order'            => 'Please enter order',
        'status'           => 'Please select status',
        'keyword'          => 'Please enter keyword',
        'description'      => 'Please enter description',
        'slug'             => 'Please enter slug',
        'category_id'      => 'Please enter category',
    ],

    /**
     * Columns array for show hide checkbox.
     */
    'cloumns'     => [
        'name'    => ['name' => 'Name', 'data-column' => 1, 'checked' => 'checked', 'disabled' => 'disabled'],
        'title'   => ['name' => 'Title', 'data-column' => 2, 'checked' => 'checked'],
        'url'     => ['name' => 'URL', 'data-column' => 3, 'checked' => 'checked', 'disabled' => 'disabled'],
        'heading' => ['name' => 'Heading', 'data-column' => 4, 'checked' => 'checked'],
        'order'   => ['name' => 'Order', 'data-column' => 5],
    ],

    'message'     => [
        'nopage' => 'Page not found.',
    ],
    'tab'         => [
        'page'    => 'Page',
        'setting' => 'Setting',
        'meta'    => 'Meta',
        'image'   => 'Image',
    ],
    'text'        => [
        'preview' => 'Click on the below list for preview',
    ],
];
