<?php declare(strict_types=1);

namespace BSP\UserAccountManagement\Tests\Adapter;

use BSP\UserAccountManagement\Application\Ports\Driven\UserId;

final class TimestampedIdentity implements UserId
{
    public function toString(): string
    {
        return (string) (new \DateTime())->getTimestamp();
    }
}
