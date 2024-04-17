<?php

declare(strict_types=1);

namespace Framework\Api;

use stdClass;

class Api implements ApiRequestInterface
{
    private string $url;

    private string $data;

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function setData(array $data): self
    {
        $this->data = http_build_query($data);
        return $this;
    }

    public function sendRequest(): stdClass
    {
        return $this->request("{$this->url}?{$this->data}");
    }

    public function request($url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);
        if ($error) {
            throw new \RuntimeException("CURL Error: {$error}");
        }
        return json_decode($response, false);
    }
}
