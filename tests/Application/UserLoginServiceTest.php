<?php

declare(strict_types=1);

namespace UserLoginService\Tests\Application;

use PHPUnit\Framework\TestCase;
use UserLoginService\Application\UserLoginService;
use UserLoginService\Domain\User;
use Exception;

final class UserLoginServiceTest extends TestCase
{
    /**
     * @test
     */
    public function userIsAlreadyLoggedIn()
    {
        $userLoginService = new UserLoginService();
        $user = new User("username");

        $userLoginService->manualLogin($user);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("User already logged in");

        $userLoginService->manualLogin($user);
    }

    /**
     * @test
     */
    public function userHasLoggedIn()
    {
        $userLoginService = new UserLoginService();
        $user = new User("username");

        $userLoginService->manualLogin($user);

        $loggedUsers = $userLoginService->getLoggedUsers();
        $this->assertContains($user, $loggedUsers);
    }
}
