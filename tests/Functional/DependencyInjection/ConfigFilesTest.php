<?php
namespace Tests\Functional\DependencyInjection;

use Tests\Common\DependencyInjection\AbstractTestClass;
use Yoanm\JsonRpcParamsSymfonyValidator\Infra\JsonRpcParamsValidator;
use Yoanm\SymfonyJsonRpcParamsValidator\DependencyInjection\JsonRpcParamsValidatorExtension;

/**
 * /!\ This test class does not cover JsonRpcHttpServerExtension, it covers yaml configuration files
 * => So no [at]covers tag !
 */
class ConfigFilesTest extends AbstractTestClass
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

    /**
     * @dataProvider provideSDKInfraServiceIdAndClass
     *
     * @param string $serviceId
     * @param string $expectedClassName
     * @param bool   $public            If service is intended to be usable by others
     */
    public function testShouldHaveService($serviceId, $expectedClassName, $public)
    {
        $this->load([]);

        $this->assertContainerBuilderHasService($serviceId, $expectedClassName);
        if (true === $public) {
            // Check that service is accessible through the container
            $this->assertNotNull($this->container->get($serviceId));
        }
    }

    /**
     * @return array
     */
    public function provideSDKInfraServiceIdAndClass()
    {
        return [
            'SDK - Infra - validator' => [
                'serviceId' => 'json_rpc_params_validator_sdk.validator',
                'serviceClassName' => JsonRpcParamsValidator::class,
                'public' => true,
            ],
        ];
    }
}
