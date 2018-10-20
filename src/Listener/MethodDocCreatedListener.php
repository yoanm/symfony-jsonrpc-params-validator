<?php
namespace Yoanm\SymfonyJsonRpcParamsValidator\Listener;

use Yoanm\JsonRpcParamsSymfonyValidator\Domain\Model\MethodWithValidatedParams;
use Yoanm\SymfonyJsonRpcHttpServerDoc\Event\MethodDocCreatedEvent;

/**
 * Class MethodDocCreatedListener
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
