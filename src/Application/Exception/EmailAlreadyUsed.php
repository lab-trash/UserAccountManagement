<?php declare(strict_types=1);

namespace BSP\UserAccountManagement\Application\Exception;

use Throwable;

final class EmailAlreadyUsed extends \Exception
{
    public function __construct($code = 0, Throwable $previous = null)
    {
        parent::__construct(sprintf('Email already used'), $code, $previous);
    }
}
