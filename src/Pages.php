<?php

namespace Litecms\Page;

use View;
use Litecms\Page\Interfaces\PageRepositoryInterface;

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
    public function __construct(PageRepositoryInterface $page)
    {
        $this->page = $page;
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
     * @param mixed  $idslug
     * @param string $field
     *
     * @return string
     */
    public function pages($idslug, $field)
    {
        $page = $this->page->getPage($idslug);

        return $page[$field];
    }

    /**
     * Returns page object.
     *
     * @param mixed  $idslug
     * @param string $field
     *
     * @return mixed
     */
    public function getPage($idslug)
    {
        return  $this->page->getPage($idslug);
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
