<?php declare(strict_types=1);

namespace BSP\UserAccountManagement\Application\Ports;

use BSP\UserAccountManagement\Application\Entity\User;

interface UserRepository
{
    public function add(User $user): void;
}
