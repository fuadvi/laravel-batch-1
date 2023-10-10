<?php

namespace App\Service\Auth;

interface IAuthService
{
    public function register(array $request);

    public function login(array $request);
}
