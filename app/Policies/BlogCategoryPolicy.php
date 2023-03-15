<?php

namespace App\Policies;

use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogCategoryPolicy
{
    use HandlesAuthorization;

    public function before(User $user): bool|null {
        if ($user->isSuperAdmin()) {
            return true;
        }
        return null;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, BlogCategory $blogCategory)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissions('blog_category.create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, BlogCategory $blogCategory)
    {
        return $user->hasPermissions('blog_category.update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, BlogCategory $blogCategory)
    {
        return $user->hasPermissions('blog_category.delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, BlogCategory $blogCategory)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, BlogCategory $blogCategory)
    {
        return $user->hasPermissions('blog_category.delete');
    }
}
