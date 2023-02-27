<?php

namespace Litecms\Page\Forms;

use Litepie\Form\FormInterpreter;

class Page extends FormInterpreter
{

    /**
     * Sets the form and form elements.
     * @return null.
     */
    public static function setAttributes()
    {

        self::$urls = config('litecms.page.page.urls');

        self::$search = config('litecms.page.page.search');

        self::$orderBy = config('litecms.page.page.order');

        self::$groups =  config('litecms.page.page.groups');

        self::$list =  config('litecms.page.page.list');

        self::$fields = config('litecms.page.page.form');

        return new static();
    }
}
