<?php

namespace App\Services\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserService
{
    public function getAll()
    {
        return User::get();
    }

    public function create(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }

    public function getById(string $id)
    {
        return User::find($id);
    }

    public function update(string $id, array $data)
    {
        $user = $this->getById($id);
        $user->update($data);

        return $user;
    }

    // public function deleteUser(User $user)
    // {
    //     return $user->delete();
    // }

}