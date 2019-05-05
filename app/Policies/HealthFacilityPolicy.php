<?php

namespace App\Policies;

use App\User;
use App\HealthFacility;
use Illuminate\Auth\Access\HandlesAuthorization;

class HealthFacilityPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // public function viewAny()

    public function create(User $user)
    {
        // return (int)$user->role === 1;
        return false;
    }

    // public function viewAny(User $user)
    // {
    //     return (int)$user->role === 1;
    // }

    public function view(User $user, HealthFacility $hf)
    {
        return ($hf->owner && $user->id === $hf->owner->id) || (int)$user->role === 1;
    }

    public function update(User $user, HealthFacility $hf)
    {
        return $user->role === 1 || ($user->healthFacility() && $user->healthFacility()->id === $hf->id);
    }
}
