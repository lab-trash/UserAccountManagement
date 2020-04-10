<?php declare(strict_types=1);

namespace BSP\UserAccountManagement\Tests\Application\ValueObject;

use BSP\UserAccountManagement\Application\ValueObject\HashedPassword;
use PHPUnit\Framework\TestCase;

final class HashedPasswordTest extends TestCase
{
    public function test that hashedPassword value is encoded(): void
    {
        // GIVEN
        $plainPassword = "WhatAGreat_password!";

        // WHEN
        $hashedPassword = HashedPassword::hash($plainPassword);

        // THEN
        $this->assertTrue($plainPassword !== $hashedPassword);
    }

    public function test that hashedPassword cannot be built fromHash with a plainPassword(): void
    {
        // EXPECT
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('password is not hashed');

        // GIVEN
        $plainPassword = "WhatAGreat_password!";

        // WHEN
        HashedPassword::fromHash($plainPassword);
    }

    public function test equals(): void
    {
        // GIVEN
        $plainPassword = "WhatAGreat_password!";

        // WHEN
        $hashedPassword = HashedPassword::hash($plainPassword);

        // THEN
        $this->assertTrue($hashedPassword->equals($plainPassword));
        $this->assertFalse($hashedPassword->equals('not-the-right-password'));
    }
}
