<?php

namespace Litecms\Page\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Actions\Traits\Actionable;
use Litepie\Database\Model;
use Litepie\Database\Traits\Scopable;
use Litepie\Database\Traits\Searchable;
use Litepie\Database\Traits\Sluggable;
use Litepie\Database\Traits\Sortable;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Trans\Traits\Translatable;
use Litepie\Workflow\Traits\Workflowable;

class Page extends Model
{
    use Filer;
    use Hashids;
    use Sluggable;
    use SoftDeletes;
    use Sortable;
    use Translatable;
    use Scopable;
    use Actionable;
    use Workflowable;
    use Searchable;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
     protected $config = 'litecms.page.page.model';


    /*
     * Get the model that the creator belongs to.
     */
    public function owner()
    {
        return $this->morphTo(__FUNCTION__, 'user_type', 'user_id');
    }

}
