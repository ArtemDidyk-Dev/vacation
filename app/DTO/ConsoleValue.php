<?php

declare(strict_types=1);

namespace App\DTO;

final readonly class ConsoleValue
{
    public function __construct(
        public string $participants,
        public string $type,
        public string $save,
    ) {
    }
}
