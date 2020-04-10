<?php declare(strict_types=1);

namespace BSP\UserAccountManagement\Tests\Application\UseCase;

use BSP\UserAccountManagement\Application\Entity\User;
use BSP\UserAccountManagement\Application\UserRecorder;
use BSP\UserAccountManagement\Tests\Adapter\InMemoryUserRepository;
use BSP\UserAccountManagement\Tests\Adapter\TimestampedIdentity;
use PHPUnit\Framework\TestCase;

final class UserRecorderTest extends TestCase
{
    public function test that user is added to repository when record is called(): void
    {
        // GIVEN
        $userId = new TimestampedIdentity();
        $email = 'john.doe@example.com';
        $password = 'this_is_a_super_password';
        $name = 'John Doe';
        $userRepository = new InMemoryUserRepository();
        $userRecorder = new UserRecorder($userRepository);

        // EXPECT
        $this->assertSame(0, $userRepository->count());

        // WHEN
        $userRecorder->record($userId, $email, $password, $name);

        // THEN
        $this->assertSame(1, $userRepository->count());
        $this->assertInstanceOf(User::class, $userRepository->get($userId));
    }
}
