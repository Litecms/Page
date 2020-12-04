<?php

namespace Litecms\Page\Http\Controllers;

use Litepie\Http\Controllers\ResourceController;
use Litecms\Page\Http\Requests\PageRequest;
use Litecms\Page\Interfaces\PageRepositoryInterface;
use Litecms\Page\Models\Page;

/**
 * Resource controller class for page.
 */
class PageResourceController extends ResourceController
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
        $pageLimit = $request->input('pageLimit', 10);
        $data = $this->repository
            ->setPresenter(\Litecms\Page\Repositories\Presenter\PageListPresenter::class)
            ->paginate($pageLimit);
        extract($data);
        $view = 'page::page.index';
        if ($request->ajax()) {
            $view = 'page::page.more';
        }
        return $this->response->setMetaTitle(trans('page::page.names'))
            ->view($view)
            ->data(compact('data', 'meta'))
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
    public function show(PageRequest $request, Page $data)
    {

        if ($data->exists) {
            $view = 'page::page.show';
        } else {
            $view = 'page::page.new';
        }

        return $this->response
            ->setMetaTitle(trans('app.view') . ' ' . trans('page::page.name'))
            ->data(compact('data'))
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

        $data = $this->repository->newInstance([]);
        return $this->response
            ->setMetaTitle(trans('app.new') . ' ' . trans('page::page.name'))
            ->view('page::page.create', true)
            ->data(compact('data'))
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
            $attribute = $request->all();
            $attribute['user_id'] = user_id();
            $attribute['user_type'] = user_type();
            $data = $this->repository
                ->setPresenter(\Litecms\Page\Repositories\Presenter\PageShowPresenter::class)
                ->create($attribute);
            $data = current($data);
            return $this->response->message(trans('messages.success.created', ['Module' => trans('page::page.name')]))
                ->code(204)
                ->status('success')
                ->data(compact('data'))
                ->url(guard_url('page/page/' . $data['id']))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->data(compact('data'))
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
    public function edit(PageRequest $request, Page $data)
    {
        return $this->response->setMetaTitle(trans('app.edit') . ' ' . trans('page::page.name'))
            ->view('page::page.edit')
            ->data(compact('data'))
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
            $attribute = $request->all();
            $data = $this->repository
                ->setPresenter(\Litecms\Page\Repositories\Presenter\PageShowPresenter::class)
                ->update($attribute, $page->getRouteKey());
            $data = current($data);
            return $this->response
                ->message(trans('messages.success.updated', ['Module' => trans('page::page.name')]))
                ->code(204)
                ->data(compact('data'))
                ->status('success')
                ->url(guard_url('page/page/' . $page->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response
                ->message($e->getMessage())
                ->data(compact('data'))
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
                ->url(guard_url('page/page/'. $page->getRouteKey()))
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

    /**
     * Return the form elements in the for of json.
     *
     * @param String   $element
     *
     * @return json
     */
    public function form($element = 'fields')
    {
        $form = new \Litecms\Page\Form\Page();
        return $form->form($element, true);
    }
}
