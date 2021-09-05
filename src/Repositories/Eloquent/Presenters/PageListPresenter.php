<?php

namespace Litecms\Page\Repositories\Eloquent\Presenters;

use Litepie\Repository\Presenter\Presenter;

class PageListPresenter extends Presenter
{
    public function itemLink()
    {
        return guard_url('page/page') . '/' . $this->getRouteKey();
    }

    public function title()
    {
        if (!isset($this->title)) {
            return $this->title;
        }

        if (!isset($this->name)) {
            return $this->name;
        }

        return 'Title column not specified';
    }

    public function toArray()
    {
        return [
            'id' => $this->getRouteKey(),
            'title' => $this->title(),
            'description' => $this->description,
            'status' => $this->status,
            'created_at' => !is_null($this->created_at) ? $this->created_at->format('Y-m-d H:i:s') : null,
            'updated_at' => !is_null($this->updated_at) ? $this->updated_at->format('Y-m-d H:i:s') : null,
            'meta' => [
                'link' => $this->itemLink(),
                'trashed' => $this->trashed(),
            ],
        ];
    }

}
