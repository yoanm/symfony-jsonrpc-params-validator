<?php
namespace Tests\Functional\DependencyInjection;

use Tests\Common\DependencyInjection\AbstractTestClass;
use Yoanm\SymfonyJsonRpcParamsValidator\DependencyInjection\JsonRpcParamsValidatorExtension;

/**
 * @covers \Yoanm\SymfonyJsonRpcParamsValidator\DependencyInjection\JsonRpcParamsValidatorExtension
 */
class JsonRpcHttpServerExtensionTest extends AbstractTestClass
{
    /**
     * {@inheritdoc}
     */
    protected function getContainerExtensions(): array
    {
        return [
            new JsonRpcParamsValidatorExtension()
        ];
    }


    public function testShouldBeLoadable()
    {
        $this->loadContainer();

        $this->assertValidatorIsUsable();
    }

    public function testShouldReturnAnXsdValidationBasePath()
    {
        $this->assertNotNull((new JsonRpcParamsValidatorExtension())->getXsdValidationBasePath());
    }
}
