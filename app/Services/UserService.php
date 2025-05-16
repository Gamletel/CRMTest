<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private UserRepository $userRepository)
    {

    }

    public function all()
    {
        return $this->userRepository->all();
    }

    public function findById(int $id)
    {
        return $this->userRepository->findById($id);
    }

    public function store(array $data)
    {
        return $this->userRepository->store($data);
    }

    public function update(array $data, int $id)
    {
        return $this->userRepository->update($data, $id);
    }

    public function destroy(int $id)
    {
        return $this->userRepository->destroy($id);
    }
}
