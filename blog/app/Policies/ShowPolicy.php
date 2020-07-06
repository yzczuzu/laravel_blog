<?php

namespace App\Policies;

use App\User;
use App\Notebook;


class ShowPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Notebook $notebook)
    {
        return $user->id === $notebook->user_id;
    }
}
