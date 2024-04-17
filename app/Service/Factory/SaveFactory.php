<?php

declare(strict_types=1);

namespace App\Service\Factory;

use App\Enum\GetoptRequest;
use InvalidArgumentException;
use stdClass;

class SaveFactory implements SaveFactoryInterface
{
    public function save(stdClass $request, string $type): VacationInterface
    {
        return match ($type) {
            GetoptRequest::TYPE_SAVE_FILE => new VacationFile($request),
            GetoptRequest::TYPE_SAVE_CONSOLE => new VacationConsole($request),
            default => throw new InvalidArgumentException('Unknown save method'),
        };
    }
}
