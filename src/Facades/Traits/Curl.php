<?php

declare(strict_types = 1);

namespace Wame\ZelenaPostaSdk\Facades\Traits;

use CurlHandle;
use Exception;

trait Curl
{
    /**
     * @throws Exception
     */
    public function getCurlHandle(): CurlHandle
    {
        $ch = curl_init();

        curl_setopt(handle: $ch, option: CURLOPT_RETURNTRANSFER, value: true);
        curl_setopt(handle: $ch, option: CURLOPT_HEADER, value: false);

        curl_setopt(handle: $ch, option: CURLOPT_POST, value: true);

        curl_setopt(handle: $ch, option: CURLOPT_HTTPHEADER, value: [
            'Content-Type: application/json',
            "Authorization: Basic {$this->auth}",
        ]);

        if (false === $ch) {
            throw new Exception(message: 'Curl exception');
        }

        return $ch;
    }

    public function curlExec(
        string $country,
        array $formParams,
    ): bool|string {
        if (!config(key: 'zelena-posta.testing', default: false)) {
            $url = match ($country) {
                'sk' => config(key: 'zelena-posta.sk-api'),
                'cz' => config(key: 'zelena-posta.cz-api'),
            };
        } else {
            $url = config(key: 'zelena-posta.mock-api');
        }

        curl_setopt(handle: $this->curlHandle, option: CURLOPT_URL, value: "{$url}/sent/sendMailings");

        curl_setopt(handle: $this->curlHandle, option: CURLOPT_POSTFIELDS, value: json_encode($formParams));

        $response = curl_exec($this->curlHandle);
        curl_close($this->curlHandle);

        return $response;
    }
}
