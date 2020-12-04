<?php

namespace Litecms\Page\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class PageShowTransformer extends TransformerAbstract
{
    public function transform(\Litecms\Page\Models\Page $page)
    {
        return [
            'id'      => $page->getRouteKey(),
            'slug' => $page->slug,
            'url' => $page->slug.'.html',
            'name'   => $page->name,
            'heading'   => $page->heading,
            'title'   => $page->title,
            'keyword'   => $page->keyword,
            'description'   => $page->description,
            'content' => $page->content,
            'abstract' => $page->abstract,
            'banner' => $page->banner,
            'images' => $page->images,
            'view' => $page->view,
            'compiler' => $page->compiler,
            'status' => $page->status,
            'upload_folder' => $page->upload_folder,
            'order' => $page->order,
            'created_at' => $page->created_at,
            'updated_at' => $page->updated_at,
        ];
    }
}