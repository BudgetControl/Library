<?php
declare(strict_types=1);

namespace Budgetcontrol\Library\Exceptions;

final class InvalidAppKeyException extends \Exception
{
    public function __construct()
    {
        parent::__construct('APP_KEY not set');
    }
}