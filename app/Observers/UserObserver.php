<?php

namespace App\Observers;

use App\Constants\UserType;
use App\Models\User;
use App\Models\UserDetail;

class UserObserver
{
    /**
     * Handle the User "creating" event.
     */
    public function creating(User $user): void
    {
        if (empty($user->type)) {
            $user->type = UserType::STUDENT->value;
        }
    }

    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        UserDetail::query()->create([
            'user_id' => $user->id
        ]);
    }
}