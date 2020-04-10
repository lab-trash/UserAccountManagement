<?php declare(strict_types=1);

namespace BSP\UserAccountManagement\Application\Ports;

use BSP\UserAccountManagement\Application\Entity\User;
use BSP\UserAccountManagement\Application\ValueObject\Email;

interface UserRepository
{
    public function emailIsAlreadyUsed(Email $email): bool;

    public function add(User $user): void;
}
