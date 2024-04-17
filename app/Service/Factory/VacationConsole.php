<?php

declare(strict_types=1);

namespace App\Service\Factory;

use stdClass;

final readonly class VacationConsole implements VacationInterface
{
    public function __construct(
        private stdClass $data
    ) {
    }

    public function get(): string
    {
        return $this->data->error ?? $this->data->activity;
    }
}
