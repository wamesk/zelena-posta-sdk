<?php

declare(strict_types = 1);

namespace Wame\ZelenaPostaSdk\Facades;

use Wame\ZelenaPostaSdk\Exceptions\InvalidAuthTypeException;
use Wame\ZelenaPostaSdk\Facades\Traits\Auth;

class Client
{
    use Auth;

    public string $auth;

    /**
     * @throws InvalidAuthTypeException
     */
    public function __construct()
    {
        $this->auth = $this->getAuth();
    }
}
