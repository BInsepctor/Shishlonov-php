<?php

namespace App\Http\Services\Users;

use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserService
{
    public function getAllUsers()
    {
        return User::get();
    }

    public function createUser(array $data)
    {
        $this->validateUserData($data);

        return User::create($data);
    }

    public function getUserById(string $id)
    {
        return User::find($id);
    }

    public function updateUser(string $id, array $data)
    {
        $this->validateUserData($data);
        $user = $this->getUserById($id);
        $user->update($data);

        return $user;
    }

    // public function deleteUser(User $user)
    // {
    //     return $user->delete();
    // }

    protected function validateUserData(array $data)
    {
        $validate = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
        ];
        
        return Validator::make($data, $validate)->validate();
    }
}