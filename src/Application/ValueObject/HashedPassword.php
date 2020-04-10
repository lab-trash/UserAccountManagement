<?php declare(strict_types=1);

namespace BSP\UserAccountManagement\Application\ValueObject;

final class HashedPassword
{
    private string $value;

    public static function hash(string $password, string $algo = PASSWORD_DEFAULT): self
    {
        $hashedPassword = password_hash($password, $algo);

        if ($hashedPassword === false) {
            throw new \RuntimeException('failed to hash password');
        }

        return new self($hashedPassword);
    }

    public static function fromHash(string $hashedPassword): self
    {
        if (!self::isPasswordHashed($hashedPassword)) {
            throw new \LogicException('password is not hashed');
        }

        return new self($hashedPassword);
    }

    public function equals(string $password): bool
    {
        return password_verify($password, $this->value);
    }

    private function __construct(string $password)
    {
        $this->value = $password;
    }

    private static function isPasswordHashed(string $password): bool
    {
        $hashInfo = password_get_info($password);

        return $hashInfo['algo'] === 0;
    }
}
