<?php
namespace Tests\Functional\DependencyInjection;

use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Reference;
use Tests\Common\DependencyInjection\AbstractTestClass;
use Yoanm\SymfonyJsonRpcHttpServer\DependencyInjection\JsonRpcHttpServerExtension;
use Yoanm\SymfonyJsonRpcHttpServer\Endpoint\JsonRpcHttpEndpoint;
use Yoanm\SymfonyJsonRpcHttpServer\Resolver\ServiceNameResolver;
use Yoanm\SymfonyJsonRpcParamsValidator\DependencyInjection\JsonRpcParamsValidatorExtension;

/**
 * @covers \Yoanm\SymfonyJsonRpcParamsValidator\DependencyInjection\JsonRpcParamsValidatorExtension
 */
class JsonRpcHttpServerExtensionTest extends AbstractTestClass
{
    /**
     * {@inheritdoc}
     */
    protected function getContainerExtensions()
    {
        return [
            new JsonRpcParamsValidatorExtension()
        ];
    }


    public function testShouldBeLoadable()
    {
        $this->load();

        $this->assertValidatorIsUsable();
    }

    public function testShouldReturnAnXsdValidationBasePath()
    {
        $this->assertNotNull((new JsonRpcParamsValidatorExtension())->getXsdValidationBasePath());
    }
}
