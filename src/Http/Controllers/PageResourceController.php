<?php

namespace Litecms\Page\Http\Controllers;

use Exception;
use Litecms\Page\Actions\PageAction;
use Litecms\Page\Actions\PageActions;
use Litecms\Page\Forms\Page as PageForm;
use Litecms\Page\Http\Requests\PageResourceRequest;
use Litecms\Page\Http\Resources\PageResource;
use Litecms\Page\Http\Resources\PagesCollection;
use Litecms\Page\Models\Page;
use Litepie\Http\Controllers\ResourceController as BaseController;

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
    public function __construct()
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {
            $this->form = PageForm::grouped(false)
                ->setAttributes()
                ->toArray();
            $this->modules = $this->modules(config('litecms.page.modules'), 'page', guard_url('page'));
            return $next($request);
        });
    }

    /**
     * Display a list of page.
     *
     * @return Response
     */
    public function index(PageResourceRequest $request)
    {
        $request = $request->all();
        $page = PageActions::run('paginate', $request);

        $data = new PagesCollection($page);

        $form = $this->form;
        $modules = $this->modules;

        return $this->response->setMetaTitle(trans('page::page.names'))
            ->view('page::page.index')
            ->data(compact('data', 'modules', 'form'))
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
    public function show(PageResourceRequest $request, Page $model)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = new PageResource($model);
// dd($this->form);
        return $this->response
            ->setMetaTitle(trans('app.view') . ' ' . trans('page::page.name'))
            ->data(compact('data', 'form', 'modules'))
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
    public function create(PageResourceRequest $request, Page $model)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = new PageResource($model);
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
    public function store(PageResourceRequest $request, Page $model)
    {
        try {
            $request = $request->all();
            $model = PageAction::run('store', $model, $request);
            $data = new PageResource($model);
            return $this->response->message(trans('messages.success.created', ['Module' => trans('page::page.name')]))
                ->code(204)
                ->data(compact('data'))
                ->status('success')
                ->url(guard_url('page/page/' . $model->getRouteKey()))
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
    public function edit(PageResourceRequest $request, Page $model)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = new PageResource($model);
        // return view('page::page.edit', compact('data', 'form', 'modules'));

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
    public function update(PageResourceRequest $request, Page $model)
    {
        try {
            $request = $request->all();
            $model = PageAction::run('update', $model, $request);
            $data = new PageResource($model);

            return $this->response->message(trans('messages.success.updated', ['Module' => trans('page::page.name')]))
                ->code(204)
                ->status('success')
                ->data(compact('data'))
                ->url(guard_url('page/page/' . $model->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('page/page/' . $model->getRouteKey()))
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
    public function destroy(PageResourceRequest $request, Page $model)
    {
        try {

            $request = $request->all();
            $model = PageAction::run('destroy', $model, $request);
            $data = new PageResource($model);

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
                ->url(guard_url('page/page/' . $model->getRouteKey()))
                ->redirect();
        }

    }
}
