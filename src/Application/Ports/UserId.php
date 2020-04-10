<?php declare(strict_types=1);

namespace BSP\UserAccountManagement\Application\Ports;

interface UserId
{
    public function toString(): string;
}
