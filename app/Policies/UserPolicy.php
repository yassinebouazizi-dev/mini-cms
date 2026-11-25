<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can change another user's role.
     */
    public function updateRole(User $currentUser, User $targetUser): bool
    {
        return $currentUser->isAdmin() && $currentUser->id !== $targetUser->id;
    }
}
