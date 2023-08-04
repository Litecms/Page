<?php

namespace Litecms\Page\Policies;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Litecms\Page\Models\Page;

class PagePolicy
{


    /**
     * Determine if the given user can view the page.
     *
     * @param Authenticatable $user
     * @param Page $page
     *
     * @return bool
     */
    public function view(Authenticatable $user, Page $page)
    {
        if ($user->canDo('page.page.view') && $user->isAdmin()) {
            return true;
        }

        return $page->user_id == user_id() && $page->user_type == user_type();
    }

    /**
     * Determine if the given user can create a page.
     *
     * @param Authenticatable $user
     *
     * @return bool
     */
    public function create(Authenticatable $user)
    {
        return  $user->canDo('page.page.create');
    }

    /**
     * Determine if the given user can update the given page.
     *
     * @param Authenticatable $user
     * @param Page $page
     *
     * @return bool
     */
    public function update(Authenticatable $user, Page $page)
    {
        if ($user->canDo('page.page.edit') && $user->isAdmin()) {
            return true;
        }

        return $page->user_id == user_id() && $page->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given page.
     *
     * @param Authenticatable $user
     *
     * @return bool
     */
    public function destroy(Authenticatable $user, Page $page)
    {
        return $page->user_id == user_id() && $page->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given page.
     *
     * @param Authenticatable $user
     *
     * @return bool
     */
    public function verify(Authenticatable $user, Page $page)
    {
        if ($user->canDo('page.page.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given page.
     *
     * @param Authenticatable $user
     *
     * @return bool
     */
    public function approve(Authenticatable $user, Page $page)
    {
        if ($user->canDo('page.page.approve')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the user can perform a given action ve.
     *
     * @param [type] $user    [description]
     * @param [type] $ability [description]
     *
     * @return [type] [description]
     */
    public function before($user, $ability)
    {
        if ($user->isSuperuser()) {
            return true;
        }
    }
}
