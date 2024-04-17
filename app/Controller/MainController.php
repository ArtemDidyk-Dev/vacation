<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\ConsoleValue;
use App\Enum\GetoptRequest;
use App\Service\Factory\SaveFactoryInterface;
use Framework\Api\ApiRequestInterface;
use Framework\Controller\Controller;

class MainController extends Controller
{
    public function __construct(
        public ConsoleValue $consoleValueDTO,
        public ApiRequestInterface $apiRequestInterface,
        public SaveFactoryInterface $saveFactory
    ) {
    }

    public function index(): void
    {
        $request = $this->apiRequestInterface
            ->setUrl($_ENV['BOREDAPI_API_URL'])
            ->setData(
                [
                    GetoptRequest::PARTICIPANTS => $this->consoleValueDTO->participants,
                    GetoptRequest::TYPE => $this->consoleValueDTO->type,
                ]
            )
            ->sendRequest();
        try {
            $result = $this->saveFactory->save($request, $this->consoleValueDTO->save);
            echo $result->get();
        } catch (\Exception $e) {
            echo $e->getMessage(), "\n";
        }
    }
}
