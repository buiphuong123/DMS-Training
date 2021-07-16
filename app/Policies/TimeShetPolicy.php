<?php

namespace App\Policies;

use App\Models\TimeSheet;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TimeShetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role->name === 'admin';
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TimeSheet  $timeSheet
     * @return mixed
     */
    public function view(User $user, TimeSheet $timeSheet)
    {
        return $user->role->name === 'admin' || $user->id === $timesheet->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TimeSheet  $timeSheet
     * @return mixed
     */
    public function update(User $user, TimeSheet $timeSheet)
    {
        return $user->id === $timeSheet->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TimeSheet  $timeSheet
     * @return mixed
     */
    public function delete(User $user, TimeSheet $timeSheet)
    {
        return $user->id === $timeSheet->user_id || $user->role->name === 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TimeSheet  $timeSheet
     * @return mixed
     */
    public function restore(User $user, TimeSheet $timeSheet)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TimeSheet  $timeSheet
     * @return mixed
     */
    public function forceDelete(User $user, TimeSheet $timeSheet)
    {
        //
    }
}
