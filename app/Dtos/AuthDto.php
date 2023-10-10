<?php

namespace App\Dtos;

use Illuminate\Support\Facades\Hash;

readonly class AuthDto
{
    public function __construct(
        public ?string $name,
        public ?string $email,
        public ?string $phone_number,
        public ?string $password,
        public ?int $role_id,
    )
    {
    }

    public static function fromRequestRegister(array $request): self
    {
        return new self(
            name: $request['name'],
            email: $request['email'],
            phone_number: $request['phone_number'],
            password: Hash::make($request['password']),
            role_id: $request['role_id'],
        );
    }

    public static function fromRequestLogin(array $request): self
    {
        return new self(
            name: $request['name'],
            email: $request['email'],
            phone_number: $request['phone_number'],
            password: Hash::make($request['password']),
            role_id: $request['role_id'],
        );
    }

}
