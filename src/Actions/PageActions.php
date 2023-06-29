<?php

namespace Litecms\Page\Actions;

use Illuminate\Support\Str;
use Litecms\Page\Models\Page;
use Litecms\Page\Scopes\PageResourceScope;
use Litepie\Actions\Concerns\AsAction;
use Litepie\Actions\Traits\LogsActions;
use Litepie\Database\RequestScope;

class PageActions
{
    use AsAction;
    use LogsActions;
    
    private $model;

    public function handle(string $action, array $request)
    {
        $this->model = app(Page::class);

        $function = Str::camel($action);

        event('litecms.page.page.action.' . $action . 'ing', [$request]);
        $data = $this->$function($request);
        event('litecms.page.page.action.' . $action . 'ed', [$data]);

        $this->logsAction();
        return $data;

    }

    public function paginate(array $request)
    {
        $pageLimit = isset($request['pageLimit']) ?: config('database.pagination.limit');
        $page = $this->model
            ->pushScope(new RequestScope())
            ->pushScope(new PageResourceScope())
            ->paginate($pageLimit);

        return $page;
    }

    public function simplePaginate(array $request)
    {
        $pageLimit = isset($request['pageLimit']) ?: config('database.pagination.limit');
        $page = $this->model
            ->pushScope(new RequestScope())
            ->pushScope(new PageResourceScope())
            ->simplePaginate($pageLimit);

        return $page;
    }

    function empty(array $request) {
        return $this->model->forceDelete();
    }

    function restore(array $request) {
        return $this->model->restore();
    }

    public function delete(array $request)
    {
        $ids = $request['ids'];
        $ids = collect($ids)->map(function ($id) {
            return hashids_decode($id);
        });
        return $this->model->whereIn('id', $ids)->delete();
    }
}
