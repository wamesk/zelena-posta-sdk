<?php

declare(strict_types = 1);

//declare(strict_types = 1);

namespace Wame\ZelenaPostaSdk\Facades\Traits;

use GuzzleHttp\Exception\GuzzleException;

trait Sent
{
    public function sendMailings(
        string $country,
        array $formParams,
    ): bool|string {
        return $this->curlExec(
            country: $country,
            formParams: $formParams,
        );
    }
}
