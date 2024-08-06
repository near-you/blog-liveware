<?php

namespace App\Policies\Portfolio;

use App\Models\User;
use App\Models\Portfolio\Portfolio;
use Illuminate\Auth\Access\HandlesAuthorization;

class PortfolioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_portfolio::portfolio');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Portfolio $portfolio): bool
    {
        return $user->can('view_portfolio::portfolio');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_portfolio::portfolio');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Portfolio $portfolio): bool
    {
        return $user->can('update_portfolio::portfolio');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Portfolio $portfolio): bool
    {
        return $user->can('delete_portfolio::portfolio');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_portfolio::portfolio');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Portfolio $portfolio): bool
    {
        return $user->can('force_delete_portfolio::portfolio');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_portfolio::portfolio');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Portfolio $portfolio): bool
    {
        return $user->can('restore_portfolio::portfolio');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_portfolio::portfolio');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Portfolio $portfolio): bool
    {
        return $user->can('replicate_portfolio::portfolio');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_portfolio::portfolio');
    }
}
