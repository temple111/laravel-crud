<?php
namespace App\Policies;

use App\Models\component;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ComponentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\component  $component
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Component $component)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\component  $component
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Component $component)
    {
        return $user->id === $component->user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\component  $component
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Component $component)
    {
        return $user->id === $component->user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\component  $component
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Component $component)
    {

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\component  $component
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Component $component)
    {
        //
    }
}
