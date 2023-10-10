<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Service\Auth\IAuthService;
use App\Traits\ResponFormater;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    use ResponFormater;

    public function __construct(
        public IAuthService $authService
    )
    {
    }


    public function register(RegisterRequest $request)
    {
        try {
            $this->authService->register($request->validated());
            return $this->success("berhasil register",null);
        }catch (\Exception $err)
        {
           return $this->error("Internal Server Error", Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function login(LoginRequest $request)
    {
        try {
           return $this->authService->login($request->validated());
        }catch (\Exception $err)
        {
            return $this->error($err->getMessage(), $err->getCode());
        }
    }

    public function getProfile()
    {
        return auth()->user();
    }
}
