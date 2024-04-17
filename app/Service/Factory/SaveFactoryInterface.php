<?php

declare(strict_types=1);

namespace App\Service\Factory;

use stdClass;

interface SaveFactoryInterface
{
    public function save(stdClass $request, string $type);
}
