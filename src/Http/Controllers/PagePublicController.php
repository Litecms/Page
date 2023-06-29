<?php

namespace Litecms\Page\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use App\Http\Requests\PublicRequest;
use Litepie\Database\RequestScope;
use Litecms\Page\Http\Resources\PageResource;
use Litecms\Page\Http\Resources\PagesCollection;
use Litecms\Page\Scopes\PagePublicScope;
use Litecms\Page\Models\Page;

class PagePublicController extends BaseController
{

    /**
     * Show page's list.
     *
     * @return response
     */
    protected function index(PublicRequest $request)
    {

        $search = $request->search;
        $pageLimit = $request->input('pageLimit', config('database.pagination.limit'));
        $page = Page::pushScope(new RequestScope())
            ->pushScope(new PagePublicScope())
            ->paginate($pageLimit)
            ->withQueryString();

        $data = new PagesCollection($page);

        $categories = [];
        $tags = [];
        $recent = [];

        return $this->response->setMetaTitle(trans('page::page.names'))
            ->view('page::public.page.index')
            ->data(compact('data', 'categories', 'tags', 'recent'))
            ->output();
    }

    /**
     * Show page.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show(PublicRequest $request, $slug)
    {
        $page = Page::findBySlug($slug);
        
        if (is_null($page)) {
            abort(404);
        }

        //Set theme variables
        $view = 'public.page.' . $page['view'];
        $view = view()->exists('page::public.' . $view) ? $view : 'default';

        if ($page['compile']) {
            $page['content'] = blade_compile($page['content']);
        }
    
        return $this->response->setMetaTitle($page['title'] . trans('page::page.name'))
            ->view('page::public.' . $view)
            ->data(compact('page'))
            ->output();
    }

}
