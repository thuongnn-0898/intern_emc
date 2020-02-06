<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
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

    public function edit(User $user)
    {
        if(Auth::user()->isAdmin()){

            return true;
        }else{

            return $user->id == Auth::id();
        }
    }

    public function destroy(User $user)
    {
        return $user->isAdmin();
    }

}
