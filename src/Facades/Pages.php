<?php

namespace Litecms\Page\Facades;

use Illuminate\Support\Facades\Facade;

class Pages extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'litecms.page';
    }
}
