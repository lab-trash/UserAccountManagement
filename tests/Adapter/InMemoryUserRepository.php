<?php declare(strict_types=1);

namespace BSP\UserAccountManagement\Tests\Adapter;

use BSP\UserAccountManagement\Application\Entity\User;
use BSP\UserAccountManagement\Application\Ports\UserId;
use BSP\UserAccountManagement\Application\Ports\UserRepository;
use Exception;

final class InMemoryUserRepository implements UserRepository
{
    /** @var User[] */
    private array $users = [];

    public function add(User $user): void
    {
        $this->users[$user->id()->toString()] = $user;
    }

    /**
     * @throws Exception
     */
    public function get(UserId $userId): User
    {
        if (!isset($this->users[$userId->toString()])) {
            throw new Exception('user not found');
        }

        return $this->users[$userId->toString()];
    }

    public function count(): int
    {
        return \count($this->users);
    }
}
