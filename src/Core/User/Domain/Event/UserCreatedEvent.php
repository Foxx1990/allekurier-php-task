<?php

namespace App\Core\User\Domain\Event;

use App\Common\EventManager\EventInterface;
use App\Core\User\Domain\User;

class UserCreatedEvent implements EventInterface
{
    public function __construct(private readonly User $user)
    {
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
