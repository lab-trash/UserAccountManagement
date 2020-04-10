<?php declare(strict_types=1);

namespace BSP\UserAccountManagement\Application\Entity;

use BSP\UserAccountManagement\Application\Ports\Driven\UserId;
use BSP\UserAccountManagement\Application\ValueObject\Email;
use BSP\UserAccountManagement\Application\ValueObject\HashedPassword;

final class User
{
    private UserId $id;
    private Email $email;
    private HashedPassword $hashedPassword;
    private string $name;

    public function __construct(
        UserId $id,
        Email $email,
        HashedPassword $hashedPassword,
        string $name
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->hashedPassword = $hashedPassword;
        $this->name = $name;
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function email(): Email
    {
        return $this->email;
    }
}
