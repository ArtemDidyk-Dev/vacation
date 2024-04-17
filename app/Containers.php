<?php

declare(strict_types=1);

namespace App;

use App\Controller\MainController;
use App\DTO\ConsoleValue;
use App\Enum\GetoptRequest;
use App\Service\Factory\SaveFactory;
use Framework\Api\Api;

class Containers
{
    public array $containers;

    public function __construct()
    {
        $consoleValue = GetoptRequest::toArray();
        $this->containers['MainController'] = new MainController(
            new ConsoleValue(
                $consoleValue[GetoptRequest::PARTICIPANTS],
                $consoleValue[GetoptRequest::TYPE],
                $consoleValue[GetoptRequest::SAVE],
            ),
            new Api(),
            new SaveFactory(),
        );
    }
}
