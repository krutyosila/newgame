<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{

    /**
     * @param $username
     * @param $password
     * @param $role
     * @param $limitless
     * @param $userId
     * @return User
     */
    public function create($username, $password, $role, $limitless, $userId = null): mixed
    {
        try {
            try {
                $user = User::create([
                    'user_id' => $userId,
                    'username' => $username,
                    'password' => Hash::make($password),
                    'role' => $role,
                    'bayonet' => false,
                    'limitless' => $limitless
                ]);
            } catch (\Exception $e) {
                return false;
            }
            $user->update(['token' => md5($user->id . $user->username)]);
            return $user;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @param User $user
     * @param $payload
     * @return mixed
     */
    public function update(User $user, $payload): mixed
    {
        if (isset($payload['password'])) {
            $payload['password'] = Hash::make($payload['password']);
        }
        return $user->update($payload);
    }
}
