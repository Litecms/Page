<?php

namespace Litecms\Page\Http\Controllers;

use App\Http\Controllers\APIController as BaseController;
use Litecms\Page\Http\Requests\PageRequest;
use Litecms\Page\Interfaces\PageRepositoryInterface;
use Litecms\Page\Models\Page;

/**
 * Resource controller class for page.
 */
class PageAPIController extends BaseController
{

    /**
     * Initialize page resource controller.
     *
     * @param type PageRepositoryInterface $page
     *
     * @return null
     */
    public function __construct(PageRepositoryInterface $page)
    {
        parent::__construct();
        $this->repository = $page;
        $this->repository
            ->pushCriteria(\Litepie\Repository\Criteria\RequestCriteria::class)
            ->pushCriteria(\Litecms\Page\Repositories\Criteria\PageResourceCriteria::class);
    }

    /**
     * Display a list of page.
     *
     * @return Response
     */
    public function index(PageRequest $request)
    {
        return $this->repository
            ->setPresenter(\Litecms\Page\Repositories\Presenter\PageListPresenter::class)
            ->paginate();
    }

    /**
     * Display page.
     *
     * @param Request $request
     * @param Model   $page
     *
     * @return Response
     */
    public function show(PageRequest $request, Page $page)
    {
        return $page;
    }

    /**
     * Create new page.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(PageRequest $request)
    {
        try {
            $data              = $request->all();
            $data['user_id']   = user_id();
            $data['user_type'] = user_type();
            $data              = $this->repository->create($data);
            $message           = trans('messages.success.created', ['Module' => trans('page::page.name')]);
            $code              = 204;
            $status            = 'success';
            $url               = guard_url('page/page/' . $page->getRouteKey());
        } catch (Exception $e) {
            $message = $e->getMessage();
            $code    = 400;
            $status  = 'error';
            $url     = guard_url('page/page');
        }
        return compact('data', 'message', 'code', 'status', 'url');
    }

    /**
     * Update the page.
     *
     * @param Request $request
     * @param Model   $page
     *
     * @return Response
     */
    public function update(PageRequest $request, Page $page)
    {
        try {
            $data = $request->all();

            $page->update($data);
            $message = trans('messages.success.updated', ['Module' => trans('page::page.name')]);
            $code    = 204;
            $status  = 'success';
            $url     = guard_url('page/page/' . $page->getRouteKey());
        } catch (Exception $e) {
            $message = $e->getMessage();
            $code    = 400;
            $status  = 'error';
            $url     = guard_url('page/page/' . $page->getRouteKey());
        }
        return compact('data', 'message', 'code', 'status', 'url');
    }

    /**
     * Remove the page.
     *
     * @param Model   $page
     *
     * @return Response
     */
    public function destroy(PageRequest $request, Page $page)
    {
        try {
            $page->delete();
            $message = trans('messages.success.deleted', ['Module' => trans('page::page.name')]);
            $code    = 202;
            $status  = 'success';
            $url     = guard_url('page/page/0');
        } catch (Exception $e) {
            $message = $e->getMessage();
            $code    = 400;
            $status  = 'error';
            $url     = guard_url('page/page/' . $page->getRouteKey());
        }
        return compact('message', 'code', 'status', 'url');
    }
}
