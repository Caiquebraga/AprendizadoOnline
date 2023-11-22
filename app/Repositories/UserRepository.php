<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{

    public function getUser()
    {
        return User::all();
    }

    public function createUser(array $userData)
    {
        return User::create($userData);
    }

    public function updateUser(User $user, array $userData)
    {
        $user->update($userData);
        return $user;
    }

    public function deleteUser(User $user)
    {
        $user->delete();
    }

    public function getPaginateUsers($perPage = 10)
    {
        return User::paginate($perPage);
    }

    public function getUserByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function getUserWithInstrutor($userId)
    {
        return User::with('instrutor')->find($userId);
    }
}
