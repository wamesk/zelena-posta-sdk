<?php

namespace Wame\ZelenaPostaSdk\Facades\Traits;

use Wame\ZelenaPostaSdk\Enums\AuthType;
use Wame\ZelenaPostaSdk\Exceptions\InvalidAuthTypeException;

trait Auth
{
    /**
     * @throws InvalidAuthTypeException
     */
    private function getAuth(): string
    {
        $authType = config(key: 'zelena-posta.auth-type', default: AuthType::BASIC_AUTH);

        if (AuthType::BASIC_AUTH === $authType) {
            $username = config(key: 'zelena-posta.username');
            $password = config(key: 'zelena-posta.password');

            return base64_encode(string: "{$username}:{$password}");
        } elseif (AuthType::OAUTH_2 === $authType) {
            return '';
        }

        throw new InvalidAuthTypeException();
    }
}
