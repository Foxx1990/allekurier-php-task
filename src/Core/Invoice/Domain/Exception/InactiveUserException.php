<?php

namespace App\Core\Invoice\Domain\Exception;

class InactiveUserException extends InvoiceException
{
    public function __construct()
    {
        parent::__construct('Cannot create invoice for inactive user');
    }
}
