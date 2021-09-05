<?php

namespace Litecms\Page\Repositories\Eloquent\Presenters;

use Litepie\Repository\Presenter\Presenter;

class PageItemPresenter extends Presenter
{

    public function itemLink()
    {
        return guard_url('page/page') . '/' . $this->getRouteKey();
    }
    
    public function toArray()
    {
        return [
            'id' => $this->getRouteKey(),
            'name' => $this->name,
            'title' => $this->title,
            'heading' => $this->heading,
            'sub_heading' => $this->sub_heading,
            'abstract' => $this->abstract,
            'content' => $this->content,
            'meta_title' => $this->meta_title,
            'meta_keyword' => $this->meta_keyword,
            'meta_description' => $this->meta_description,
            'banner' => $this->banner,
            'images' => $this->images,
            'compile' => $this->compile,
            'view' => $this->view,
            'category' => $this->category,
            'order' => $this->order,
            'slug' => $this->slug,
            'status' => $this->status,
            'upload_folder' => $this->upload_folder,
            'created_at' => !is_null($this->created_at) ? $this->created_at->format('Y-m-d H:i:s') : null,
            'updated_at' => !is_null($this->updated_at) ? $this->updated_at->format('Y-m-d H:i:s') : null,
            'meta' => [
                'exists' => $this->exists,
                'link' => $this->itemLink(),
                'upload_url' => $this->getUploadURL(''),
            ],
        ];
    }
}
