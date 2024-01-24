<?php

declare(strict_types = 1);

namespace Wame\ZelenaPostaSdk\Enums;

enum AuthType: string
{
    case BASIC_AUTH = '1';
    case OAUTH_2 = '2';
}
