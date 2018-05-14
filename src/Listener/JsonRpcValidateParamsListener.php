<?php
namespace Yoanm\SymfonyJsonRpcParamsValidator\Listener;

use Yoanm\JsonRpcParamsSymfonyValidator\JsonRpcParamsValidator;
use Yoanm\JsonRpcServer\Domain\Event\Action\ValidateParamsEvent;
use Yoanm\SymfonyJsonRpcHttpServer\Event\SymfonyJsonRpcServerEvent;

/**
 * Class JsonRpcValidateParamsListener
 */
class JsonRpcValidateParamsListener
{
    /** @var JsonRpcParamsValidator */
    private $jsonRpcParamsValidator;

    /**
     * @param JsonRpcParamsValidator $jsonRpcParamsValidator
     */
    public function __construct(JsonRpcParamsValidator $jsonRpcParamsValidator)
    {
        $this->jsonRpcParamsValidator = $jsonRpcParamsValidator;
    }

    /**
     * @param SymfonyJsonRpcServerEvent $event
     */
    public function __invoke(SymfonyJsonRpcServerEvent $event)
    {
        $jsonRpcServerEvent = $event->getJsonRpcServerEvent();
        if (!$jsonRpcServerEvent instanceof ValidateParamsEvent) {
            return;
        }
        $this->jsonRpcParamsValidator->validate($jsonRpcServerEvent);
    }
}
