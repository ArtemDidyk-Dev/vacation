<?php

declare(strict_types=1);

namespace Framework\Api;

interface ApiRequestInterface
{
    public function setUrl(string $url): self;

    public function setData(array $data): self;

    public function sendRequest();
}
