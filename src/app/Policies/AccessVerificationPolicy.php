<?php

namespace App\Policies;

use App\Models\User;

class AccessVerificationPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewAdminPanel(User $user): bool
    {
        return $user->role->id == 1;
    }

    public function viewLookingPanel(User $user): bool
    {
        return $user->role->id == 2;
    }
}
