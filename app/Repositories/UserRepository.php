<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    public function all(): Collection
    {
        return User::all();
    }

    public function findById(int $id)
    {
        return User::findOrFail($id);
    }

    public function store(array $data): User
    {
        return User::create($data);
    }

    public function update(array $data, int $id): User
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }
    public function destroy(int $id): bool
    {
        return (bool) User::destroy($id);
    }
}
