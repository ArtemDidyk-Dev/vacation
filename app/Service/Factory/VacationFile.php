<?php

declare(strict_types=1);

namespace App\Service\Factory;

use stdClass;

final readonly class VacationFile implements VacationInterface
{
    public function __construct(
        private stdClass $data
    ) {
    }

    public function get(): string
    {
        if (isset($this->data->error)) {
            return $this->data->error;
        }
        $data = $this->data->activity . PHP_EOL;
        file_put_contents('./file/file.txt', $data, FILE_APPEND);
        return 'data save';
    }
}
