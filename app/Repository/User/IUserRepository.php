<?php

namespace App\Repository\User;

use App\Models\User;

interface IUserRepository
{
    public function getUserByEmail(string $email): ?User;
    public function create(array $data): ?User;
    public function update(array $data,  int $userId): void;
    public function delete(int $userId): void;
}
