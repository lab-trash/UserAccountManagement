<?php declare(strict_types=1);

namespace BSP\UserAccountManagement\Application\ValueObject;

final class HashedPassword
{
    private string $value;

    public static function Hash(string $password, string $algo = PASSWORD_DEFAULT): self
    {
        return new self(password_hash($password, $algo));
    }

    public static function FromHash(string $hashedPassword): self
    {
        if (!self::isPasswordHashed($hashedPassword)) {
            throw new \LogicException('password is not hashed');
        }

        return new self($hashedPassword);
    }

    public function value(): string
    {
        return $this->value;
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
