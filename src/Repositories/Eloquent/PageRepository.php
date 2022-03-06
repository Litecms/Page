<?php

namespace Litecms\Page\Repositories\Eloquent;

use Litecms\Page\Interfaces\PageRepositoryInterface;
use Litepie\Repository\BaseRepository;
use Litecms\Page\Repositories\Eloquent\Presenters\PageItemPresenter;

class PageRepository extends BaseRepository implements PageRepositoryInterface
{

    public function boot()
    {
        // $this->pushFilter(RequestFilter::class);
        $this->fieldSearchable = config('litecms.page.page.model.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('litecms.page.page.model.model');
    }

    /**
     * Get page by id or slug.
     *
     * @return void
     */
    public function getPage($var)
    {
        return $this->findBySlug($var)->toArray();
    }

    /**
     * Get page by id or slug.
     *
     * @return void
     */
    public function presenter()
    {
        return PageItemPresenter::class;
    }
}
