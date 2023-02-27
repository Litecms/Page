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
            ->select('pages.*')
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
        $model = Page::findBySlug($slug);
        $data = new PageResource($model);

        $categories = [];
        $tags = [];
        $recent = [];
    
        return $this->response->setMetaTitle($data['title'] . trans('page::page.name'))
            ->view('page::public.page.show')
            ->data(compact('data', 'categories', 'tags', 'recent'))
            ->output();
    }

}
