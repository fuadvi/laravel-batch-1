<?php

namespace App\Repository\User;

use App\Models\User;
use App\Repository\User\IUserRepository;

class UserRepository implements IUserRepository
{
    public function __construct(
        public User $user
    )
    {
    }


    public function getUserByEmail(string $email): ?User
    {
        return $this->user->whereEmail($email)->first();
    }

    public function create(array $data): ?User
    {
        return $this->user->create($data);
    }

    public function update(array $data, int $userId): void
    {
        $this->user->findOrFail($userId)->update($data);
    }

    public function delete(int $userId): void
    {
        $this->user->findOrFail($userId)->delete();
    }
}
