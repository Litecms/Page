<?php

namespace Litecms\Page\Http\Controllers;

use Litepie\Http\Controllers\PublicController as BaseController;
use Litecms\Page\Interfaces\PageRepositoryInterface;

class PagePublicController extends BaseController
{
    /**
     * Constructor.
     *
     * @return type
     */
    public function __construct(PageRepositoryInterface $page)
    {
        parent::__construct();
        $this->modules = $this->modules(config('litecms.page.modules'), 'page', guard_url('page'));
        $this->repository = $page;

    }

    /**
     * Show page.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function getPage($slug)
    {
        // get page by slug
        $page = $this->repository->getPage($slug);
        
        if (is_null($page)) {
            abort(404);
        }

        //Set theme variables
        $view = $page['view'];
        $view = view()->exists('page::' . $view) ? $view : 'default';

        if ($page['compile']) {
            $page['content'] = blade_compile($page['content']);
        }

        return $this->response
            ->setMetaKeyword(strip_tags($page['meta_keyword']))
            ->setMetaDescription(strip_tags($page['meta_description']))
            ->setMetaTitle(strip_tags($page['meta_title']))
            ->view('page::public.' . $view)
            ->data(compact('page'))
            ->output();

    }

}
