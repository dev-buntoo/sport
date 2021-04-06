<?php

namespace App\Services;

use App\User;
use Carbon\Carbon;

final class IsActive
{
    public function __construct($user_id)
    {
        $this->user = $user_id;
    }
    /**
     * Get All notifications for any user
     */
    public function updateStatus()
    {
        $user = User::find($this->user);
        $user->is_active = Carbon::now()->format('Y-m-d h:i:s');
        $user->save();
    }
    public function activeUsers()
    {
        $activeUsers = User::where('is_active', '>=', Carbon::now()->subMinutes(5)->format('Y-m-d h:i:s'))->get();
        return $activeUsers;
    }

    public function offlineUsers()
    {
        $offlineUsers1 = User::where('is_active', '<', Carbon::now()->subMinutes(5)->format('Y-m-d h:i:s'))->get();
        $offlineUsers2 = User::whereNull('is_active')->get();
        $offlineUsers = $offlineUsers1->merge($offlineUsers2);
        return $offlineUsers;
    }
}
