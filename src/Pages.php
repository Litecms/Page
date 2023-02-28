<?php

namespace Litecms\Page;

use View;
use Litecms\Page\Models\Page;

/**
 *
 */
class Pages
{
    /**
     * $page object.
     */
    protected $page;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->page = new Page();
    }

    /**
     * Calls page repository function.
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return $this->page->$name($arguments[0]);
    }

    /**
     * @param int $perpage
     *
     * @return mixed
     */
    public function gadget($perpage = 10)
    {
        $data['pages'] = $this->page->paginate($perpage);

        return View::make('page::admin.page.gadget', $data);
    }

    /**
     * Return return field value of a page.
     *
     * @param mixed  $slug
     * @param string $field
     *
     * @return string
     */
    public function pages($slug, $field)
    {
        $page = $this->page->findBySlug($slug);

        return $page[$field];
    }

    /**
     * Returns page object.
     *
     * @param mixed  $slug
     * @param string $field
     *
     * @return mixed
     */
    public function getPage($slug)
    {
        return  $this->page->findBySlug($slug);
    }

    /**
     * Returns count of pages.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count(array $filters = null)
    {
        return  $this->page->count();
    }
}