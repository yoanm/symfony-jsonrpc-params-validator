<?php
namespace Tests\Common\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\ValidatorBuilder;
use Yoanm\SymfonyJsonRpcParamsValidator\DependencyInjection\JsonRpcParamsValidatorExtension;

abstract class AbstractTestClass extends AbstractExtensionTestCase
{
    // Public services
    const EXPECTED_VALIDATOR_SERVICE_ID = 'json_rpc_params_validator_sdk.validator';

    /**
     * {@inheritdoc}
     */
    protected function getContainerExtensions()
    {
        return [
            new JsonRpcParamsValidatorExtension()
        ];
    }

    protected function load(array $configurationValues = [], $mockSfValidator = true)
    {
        if (true === $mockSfValidator) {
            $sfValidatorDefinition = new Definition(ValidatorInterface::class);
            $sfValidatorDefinition->setFactory([new ValidatorBuilder(), 'getValidator']);
            $this->setDefinition('validator', $sfValidatorDefinition);
        }

        parent::load($configurationValues);

        // And then compile container to have correct injection
        $this->compile();
    }


    protected function assertValidatorIsUsable()
    {
        // Retrieving this service will imply to load all related dependencies
        // Any binding issues will be raised
        $this->assertNotNull($this->container->get(self::EXPECTED_VALIDATOR_SERVICE_ID));
    }
}
