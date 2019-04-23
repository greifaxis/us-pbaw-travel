<?php

namespace App\Policies;

use App\User;
use App\Hotel;
use Illuminate\Auth\Access\HandlesAuthorization;

class HotelPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the hotel.
     *
     * @param  \App\User $user
     * @param  \App\Hotel $hotel
     * @return mixedlo
     */
    public function view(User $user, Hotel $hotel)
    {
        //
    }

    /**
     * Determine whether the user can create hotels.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return in_array($user->email, User::whereHas('role', function ($query) {
            $query->where('role', 'admin');
        })->pluck('email')->toArray());
    }

    /**
     * Determine whether the user can update the hotel.
     *
     * @param  \App\User $user
     * @param  \App\Hotel $hotel
     * @return mixed
     */
    public function update(User $user, Hotel $hotel)
    {
        return in_array($user->email, User::whereHas('role', function ($query) {
            $query->where('role', 'admin');
        })->pluck('email')->toArray());
    }

    /**
     * Determine whether the user can delete the hotel.
     *
     * @param  \App\User $user
     * @param  \App\Hotel $hotel
     * @return mixed
     */
    public function delete(User $user, Hotel $hotel)
    {
        return in_array($user->email, User::whereHas('role', function ($query) {
            $query->where('role', 'admin');
        })->pluck('email')->toArray());
    }

    /**
     * Determine whether the user can restore the hotel.
     *
     * @param  \App\User $user
     * @param  \App\Hotel $hotel
     * @return mixed
     */
    public function restore(User $user, Hotel $hotel)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the hotel.
     *
     * @param  \App\User $user
     * @param  \App\Hotel $hotel
     * @return mixed
     */
    public function forceDelete(User $user, Hotel $hotel)
    {
        //
    }
}
