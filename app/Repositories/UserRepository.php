<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    protected $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getUser()
    {
        return $this->userModel->all();
    }

    public function createUser(array $userData)
    {
        return $this->userModel->create($userData);
    }

    public function updateUser(array $userData)
    {
        $user = $this->userModel->find($userData['id']);
        
        $user->update($userData);
        return $user;
    }

    public function deleteUser()
    {
        $this->userModel->delete();
    }

    public function getPaginateUsers()
    {
        return $this->userModel->paginate(15);
    }

    public function getUserByEmail($email)
    {
        return $this->userModel->where('email', $email)->first();
    }

    public function getUserWithInstrutor($userId)
    {
        return $this->userModel->with('instrutor')->find($userId);
    }
}
