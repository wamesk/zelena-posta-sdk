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
        $authType = config(key: 'zelena-posta.auth-type', default: AuthType::BASIC_AUTH->value);

        if (AuthType::BASIC_AUTH->value === $authType) {
            $username = config(key: 'zelena-posta.username');
            $password = config(key: 'zelena-posta.password');

            return base64_encode(string: "{$username}:{$password}");
        } elseif (AuthType::OAUTH_2->value === $authType) {
            return '';
        }

        throw new InvalidAuthTypeException();
    }
}
