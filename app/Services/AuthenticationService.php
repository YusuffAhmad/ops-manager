<?php

namespace App\Services;

use App\Models\User;
use App\Values\CompositionToken;
use Illuminate\Hashing\HashManager;
use App\Repositories\UserRepository;
use App\Exceptions\InvalidCredentialsException;

class AuthenticationService
{
    public function __construct(
        private UserRepository $userRepository,
        private TokenManager $tokenManager,
        private HashManager $hash
    ) {
    }

    public function login(string $email, string $password): CompositionToken
    {
        /** @var User|null $user */
        $user = $this->userRepository->getFirstWhere('email', $email);

        // if (!$user || !$this->hash->check($password, $user->password)) {
        //     throw new InvalidCredentialsException();
        // }

        return $this->tokenManager->createCompositionToken($user);
    }

    public function logoutViaBearerToken(string $token): void
    {
        $this->tokenManager->deleteCompositionToken($token);
    }
}
