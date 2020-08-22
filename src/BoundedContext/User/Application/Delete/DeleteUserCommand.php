<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Application\Delete;

use Src\Shared\Domain\Command;

final class DeleteUserCommand implements Command
{
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function id(): int
    {
        return $this->id;
    }
}
