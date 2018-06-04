<?php

namespace Litecms\Page\Http\Controllers;

use App\Http\Controllers\ResourceController as BaseController;
use Litecms\Page\Http\Requests\PageRequest;
use Litecms\Page\Interfaces\PageRepositoryInterface;
use Litecms\Page\Models\Page;

/**
 * Resource controller class for page.
 */
class PageResourceController extends BaseController
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
        if ($this->response->typeIs('json')) {
            $pageLimit = $request->input('pageLimit');
            $data      = $this->repository
                ->setPresenter(\Litecms\Page\Repositories\Presenter\PageListPresenter::class)
                ->getDataTable($pageLimit);
            return $this->response
                ->data($data)
                ->output();
        }

        $pages = $this->repository->paginate();

        return $this->response->title(trans('page::page.names'))
            ->view('page::page.index')
            ->data(compact('pages'))
            ->output();
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

        if ($page->exists) {
            $view = 'page::admin.page.show';
        } else {
            $view = 'page::admin.page.new';
        }

        return $this->response->title(trans('app.view') . ' ' . trans('page::page.name'))
            ->data(compact('page'))
            ->view($view)
            ->output();
    }

    /**
     * Show the form for creating a new page.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(PageRequest $request)
    {

        $page = $this->repository->newInstance([]);
        return $this->response->title(trans('app.new') . ' ' . trans('page::page.name')) 
            ->view('page::page.create', true) 
            ->data(compact('page'))
            ->output();
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
            $attributes              = $request->all();
            $attributes['user_id']   = user_id();
            $attributes['user_type'] = user_type();
            $page                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('page::page.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('page/page/' . $page->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('page/page'))
                ->redirect();
        }

    }

    /**
     * Show page for editing.
     *
     * @param Request $request
     * @param Model   $page
     *
     * @return Response
     */
    public function edit(PageRequest $request, Page $page)
    {
        return $this->response->title(trans('app.edit') . ' ' . trans('page::page.name'))
            ->view('page::admin.page.edit')
            ->data(compact('page'))
            ->output();
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
            $attributes = $request->all();

            $page->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('page::page.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('page/page/' . $page->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('page/page/' . $page->getRouteKey()))
                ->redirect();
        }

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
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('page::page.name')]))
                ->code(202)
                ->status('success')
                ->url(guard_url('page/page/0'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('page/page/' . $page->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove multiple page.
     *
     * @param Model   $page
     *
     * @return Response
     */
    public function delete(PageRequest $request, $type)
    {
        try {
            $ids = hashids_decode($request->input('ids'));

            if ($type == 'purge') {
                $this->repository->purge($ids);
            } else {
                $this->repository->delete($ids);
            }

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('page::page.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('page/page'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('page/page'))
                ->redirect();
        }

    }

    /**
     * Restore deleted pages.
     *
     * @param Model   $page
     *
     * @return Response
     */
    public function restore(PageRequest $request)
    {
        try {
            $ids = hashids_decode($request->input('ids'));
            $this->repository->restore($ids);

            return $this->response->message(trans('messages.success.restore', ['Module' => trans('page::page.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('page/page'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('page/page/'))
                ->redirect();
        }

    }

}