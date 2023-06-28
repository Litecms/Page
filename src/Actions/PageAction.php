<?php

namespace Litecms\Page\Actions;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Litepie\Actions\Concerns\AsAction;
use Litepie\Actions\Traits\LogsActions;
use Litepie\Notification\Traits\SendNotification;
use Litecms\Page\Models\Page;


class PageAction
{
    use AsAction;
    
    protected $model;
    protected $namespace = 'litecms.page.page';
    protected $eventClass = \Litecms\Page\Events\PageAction::class;
    protected $action;
    protected $function;
    protected $request;

    public function handle(string $action, Page $page, array $request = [])
    {
        $this->action = $action;
        $this->request = $request;
        $this->model = $page;
        $this->function = Str::camel($action);
        $this->executeAction();
        return $this->model;
    }


    public function store(Page $page, array $request)
    {
        $attributes = $request;
        $attributes['user_id'] = user_id();
        $attributes['user_type'] = user_type();
        $page = $page->create($attributes);
        return $page;
    }

    public function update(Page $page, array $request)
    {
        $attributes = $request;
        $page->update($attributes);
        return $page;
    }

    public function destroy(Page $page, array $request)
    {
        $page->delete();
        return $page;
    }

    public function copy(Page $page, array $request)
    {
        $count = $request['count'] ?: 1;

        if ($count == 1) {
            $page = $page->replicate();
            $page->created_at = Carbon::now();
            $page->save();
            return $page;
        }

        for ($i = 1; $i <= $count; $i++) {
            $new = $page->replicate();
            $new->created_at = Carbon::now();
            $new->save();
        }

        return $page;
    }


}
