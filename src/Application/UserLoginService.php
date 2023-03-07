<?php

namespace UserLoginService\Application;

use UserLoginService\Domain\User;
use Exception;

class UserLoginService
{
    private array $loggedUsers = [];

    public function manualLogin(User $user) : void
    {
        if (in_array($user, $this->loggedUsers)) {
            throw new Exception("User already logged in");
        }

        $this->loggedUsers[] = $user;
    }

    public function getLoggedUsers(): array
    {
        return $this->loggedUsers;
    }
}