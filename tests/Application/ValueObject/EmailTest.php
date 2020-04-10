<?php declare(strict_types=1);

namespace BSP\UserAccountManagement\Tests\Application\ValueObject;

use BSP\UserAccountManagement\Application\ValueObject\Email;
use PHPUnit\Framework\TestCase;

final class EmailTest extends TestCase
{
    /**
     * @dataProvider emailDataProvider
     */
    public function test that an exception is thrown when invalid email is provided(string $email): void
    {
        // EXPECT
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Email "'.$email.'" is invalid');

        // WHEN
        new Email($email);
    }

    public function emailDataProvider(): array
    {
        return [
            ['email' => 'this-is-not-an-email'],
            ['email' => 'this.is.a.part@example'],
            ['email' => 'unauthorized_;_character@example.com'],
        ];
    }

    public function test equals(): void
    {
        // GIVEN
        $johnEmail = new Email('john.doe@example.com');
        $janeEmail = new Email('jane.doe@example.com');

        // THEN
        $this->assertTrue($johnEmail->equals($johnEmail));
        $this->assertFalse($johnEmail->equals($janeEmail));
    }
}
