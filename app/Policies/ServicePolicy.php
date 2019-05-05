<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function create(User $user)
    {
        return (int)$user->role === 1;
    }

    public function update(User $user)
    {
        return (int)$user->role === 1;
    }

}
