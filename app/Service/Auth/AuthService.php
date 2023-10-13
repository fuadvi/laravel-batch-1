<?php

namespace App\Service\Auth;

use App\Dtos\AuthDto;
use App\Repository\User\IUserRepository;
use App\Service\Auth\IAuthService;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthService implements IAuthService
{
    public function __construct(
        public IUserRepository $userRepo
    )
    {
    }


    public function register(array $request)
    {
        return $this->userRepo->create((array)AuthDto::fromRequestRegister($request));
    }

    public function login(array $request)
    {
        $user = $this->userRepo->getUserByEmail($request['email']);
        if (!$user || !Hash::check($request['password'], $user->password))
        {
            throw new \Exception("User atau Password Tidak di Temukan", Response::HTTP_BAD_REQUEST);
        }

        $token = $user->createToken('token')->plainTextToken;

        return [
            'token' => $token,
            'user' => (object)[
                "name" => $user->name,
                "role_id" => $user->role_id
            ]
        ];
    }

}
