<?php

namespace Litecms\Page\Http\Controllers;

use Exception;
use Litecms\Page\Forms\Page as PageForm;
use Litecms\Page\Http\Requests\PageRequest;
use Litecms\Page\Interfaces\PageRepositoryInterface;
use Litecms\Page\Repositories\Eloquent\Filters\PageResourceFilter;
use Litecms\Page\Repositories\Eloquent\Presenters\PageListPresenter;
use Litepie\Http\Controllers\ResourceController as BaseController;
use Litepie\Repository\Filter\RequestFilter;

/**
 * Resource controller class for page.
 */
class PageResourceController extends BaseController
{

    /**
     * Initialize page resource controller.
     *
     *
     * @return null
     */
    public function __construct(PageRepositoryInterface $page)
    {
        parent::__construct();
        $this->form = PageForm::setAttributes()->toArray();
        $this->modules = $this->modules(config('litecms.page.modules'), 'page', guard_url('page'));
        $this->repository = $page;

    }

    /**
     * Display a list of page.
     *
     * @return Response
     */
    public function index(PageRequest $request)
    {

        $pageLimit = $request->input('pageLimit', config('database.pagination.limit'));
        $data = $this->repository
            ->pushFilter(RequestFilter::class, $request->all())
            ->pushFilter(PageResourceFilter::class, $request->all())
            ->setPresenter(PageListPresenter::class)
            ->simplePaginate($pageLimit)
            ->toArray();

        extract($data);
        $form = $this->form;
        $modules = $this->modules;

        return $this->response->setMetaTitle(trans('page::page.names'))
            ->view('page::page.index')
            ->data(compact('data', 'meta', 'links', 'modules', 'form'))
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
    public function show(PageRequest $request, PageRepositoryInterface $repository)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = $repository->toArray();
        return $this->response
            ->setMetaTitle(trans('app.view') . ' ' . trans('page::page.name'))
            ->data(compact('data', 'form', 'modules', 'form'))
            ->view('page::page.show')
            ->output();
    }

    /**
     * Show the form for creating a new page.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(PageRequest $request, PageRepositoryInterface $repository)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = $repository->toArray();
        return $this->response->setMetaTitle(trans('app.new') . ' ' . trans('page::page.name'))
            ->view('page::page.create')
            ->data(compact('data', 'form', 'modules'))
            ->output();
    }

    /**
     * Create new page.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(PageRequest $request, PageRepositoryInterface $repository)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $attributes['user_type'] = user_type();
            $repository->create($attributes);
            $data = $repository->toArray();

            return $this->response->message(trans('messages.success.created', ['Module' => trans('page::page.name')]))
                ->code(204)
                ->data(compact('data'))
                ->status('success')
                ->url(guard_url('page/page/' . $data['id']))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('/page/page'))
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
    public function edit(PageRequest $request, PageRepositoryInterface $repository)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = $repository->toArray();

        return $this->response->setMetaTitle(trans('app.edit') . ' ' . trans('page::page.name'))
            ->view('page::page.edit')
            ->data(compact('data', 'form', 'modules'))
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
    public function update(PageRequest $request, PageRepositoryInterface $repository)
    {
        try {
            $attributes = $request->all();
            $repository->update($attributes);
            $data = $repository->toArray();
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('page::page.name')]))
                ->code(204)
                ->status('success')
                ->data(compact('data'))
                ->url(guard_url('page/page/' . $data['id']))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('page/page/' . $data['id']))
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
    public function destroy(PageRequest $request, PageRepositoryInterface $repository)
    {
        try {
            $repository->delete();
            $data = $repository->toArray();

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('page::page.name')]))
                ->code(202)
                ->status('success')
                ->data(compact('data'))
                ->url(guard_url('page/page/0'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('page/page/' . $data['id']))
                ->redirect();
        }

    }
}
