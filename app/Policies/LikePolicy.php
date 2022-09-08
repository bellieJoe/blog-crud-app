<?php

namespace App\Policies;

use App\Models\Like;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LikePolicy
{
    use HandlesAuthorization;

    public function view(User $user, Like $like)
    {
        
    }

    public function create(User $user)
    {
        //
    }

    public function delete(User $user, Like $like)
    {

    }

}
