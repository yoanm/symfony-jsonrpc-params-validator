<?php
namespace Yoanm\SymfonyJsonRpcParamsValidator\Listener;

use Yoanm\JsonRpcParamsSymfonyValidator\Doc\Transformer\ConstraintToParamsDocTransformer;
use Yoanm\JsonRpcParamsSymfonyValidator\Model\MethodWithValidatedParams;
use Yoanm\SymfonyJsonRpcHttpServerDoc\Event\MethodDocCreatedEvent;

/**
 * Class JsonRpcMethodDocCreatedListener
 */
class MethodDocCreatedListener
{
    /** ConstraintToParamsDocTransformer */
    private $paramDocConverter;

    /**
     * @param ConstraintToParamsDocTransformer $paramDocConverter
     */
    public function __construct(ConstraintToParamsDocTransformer $paramDocConverter)
    {
        $this->paramDocConverter = $paramDocConverter;
    }

    /**
     * @param MethodDocCreatedEvent $event
     */
    public function enhanceMethodDoc(MethodDocCreatedEvent $event)
    {
        $jsonRpcMethod = $event->getMethod();
        if ($jsonRpcMethod instanceof MethodWithValidatedParams) {
            $event->getDoc()->setParamsDoc(
                $this->paramDocConverter->transform($jsonRpcMethod->getParamsConstraint())
            );
        }
    }
}
