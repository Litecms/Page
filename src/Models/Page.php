<?php

namespace Litecms\Page\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Activities\Traits\LogsActivity;
use Litepie\Database\Model;
use Litepie\Database\Traits\Sluggable;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Trans\Traits\Translatable;

class Page extends Model
{
    use Filer, SoftDeletes, Hashids, Sluggable, Translatable, LogsActivity;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'litecms.page.page';

    // /**
    //  * Set the pages title and heading.
    //  *
    //  * @param  string  $value
    //  * @return void
    //  */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;

        if (empty($this->attributes['title'])) {
            $this->attributes['title'] = $value;
        }

        if (empty($this->attributes['meta_title'])) {
            $this->attributes['meta_title'] = $value;
        }

        if (empty($this->attributes['heading'])) {
            $this->attributes['heading'] = $value;
        }

        if (empty($this->attributes['sub_heading'])) {
            $this->attributes['sub_heading'] = $value;
        }

    }

}
