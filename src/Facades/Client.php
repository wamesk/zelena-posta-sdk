<?php

declare(strict_types = 1);

namespace Wame\ZelenaPostaSdk\Facades;

use CurlHandle;
use Exception;
use Wame\ZelenaPostaSdk\Exceptions\InvalidAuthTypeException;
use Wame\ZelenaPostaSdk\Facades\Traits\Auth;
use Wame\ZelenaPostaSdk\Facades\Traits\Curl;
use Wame\ZelenaPostaSdk\Facades\Traits\Sent;

class Client
{
    use Auth;
    use Curl;
    use Sent;

    protected string $auth;

    protected CurlHandle $curlHandle;

    /**
     * @throws InvalidAuthTypeException
     * @throws Exception
     */
    public function __construct()
    {
        $this->auth = $this->getAuth();
        $this->curlHandle = $this->getCurlHandle();
    }
}
