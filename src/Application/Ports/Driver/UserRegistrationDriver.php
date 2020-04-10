<?php declare(strict_types=1);

namespace BSP\UserAccountManagement\Application\Ports\Driver;

use BSP\UserAccountManagement\Application\Ports\Driven\UserId;

interface UserRegistrationDriver
{
    public function record(
        UserId $userId,
        string $email,
        string $password,
        string $name
    ): void;
}
