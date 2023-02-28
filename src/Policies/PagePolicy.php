<?php

namespace Litecms\Page\Policies;

use Litepie\User\Interfaces\UserPolicyInterface;
use Litecms\Page\Models\Page;

class PagePolicy
{


    /**
     * Determine if the given user can view the page.
     *
     * @param UserPolicyInterface $authUser
     * @param Page $page
     *
     * @return bool
     */
    public function view(UserPolicyInterface $authUser, Page $page)
    {
        if ($authUser->canDo('page.page.view') && $authUser->isAdmin()) {
            return true;
        }

        return $page->user_id == user_id() && $page->user_type == user_type();
    }

    /**
     * Determine if the given user can create a page.
     *
     * @param UserPolicyInterface $authUser
     *
     * @return bool
     */
    public function create(UserPolicyInterface $authUser)
    {
        return  $authUser->canDo('page.page.create');
    }

    /**
     * Determine if the given user can update the given page.
     *
     * @param UserPolicyInterface $authUser
     * @param Page $page
     *
     * @return bool
     */
    public function update(UserPolicyInterface $authUser, Page $page)
    {
        if ($authUser->canDo('page.page.edit') && $authUser->isAdmin()) {
            return true;
        }

        return $page->user_id == user_id() && $page->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given page.
     *
     * @param UserPolicyInterface $authUser
     *
     * @return bool
     */
    public function destroy(UserPolicyInterface $authUser, Page $page)
    {
        return $page->user_id == user_id() && $page->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given page.
     *
     * @param UserPolicyInterface $authUser
     *
     * @return bool
     */
    public function verify(UserPolicyInterface $authUser, Page $page)
    {
        if ($authUser->canDo('page.page.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given page.
     *
     * @param UserPolicyInterface $authUser
     *
     * @return bool
     */
    public function approve(UserPolicyInterface $authUser, Page $page)
    {
        if ($authUser->canDo('page.page.approve')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the user can perform a given action ve.
     *
     * @param [type] $authUser    [description]
     * @param [type] $ability [description]
     *
     * @return [type] [description]
     */
    public function before($authUser, $ability)
    {
        if ($authUser->isSuperuser()) {
            return true;
        }
    }
}
