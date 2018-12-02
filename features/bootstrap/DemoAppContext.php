<?php
namespace Tests\Functional\BehatContext;

use Behat\Gherkin\Node\PyStringNode;
use PHPUnit\Framework\Assert;
use Symfony\Component\HttpFoundation\Response;

/**
 * Defines application features from the specific context.
 */
class DemoAppContext extends AbstractContext
{
    /** @var Response|null */
    private $lastResponse;

    /**
     * @When I send following :httpMethod input on :uri demoApp kernel endpoint:
     */
    public function whenISendFollowingPayloadToDemoApp($httpMethod, $uri, PyStringNode $payload)
    {
        $this->lastResponse = $this->sendHttpContentTo(
            $uri,
            $httpMethod,
            $payload->getRaw()
        );
    }

    /**
     * @Then I should have a :httpCode response from demoApp with following content:
     */
    public function thenIShouldHaveAResponseFromDemoAppWithFollowingContent($httpCode, PyStringNode $payload)
    {
        Assert::assertInstanceOf(Response::class, $this->lastResponse);
        // Decode payload to get ride of indentation, spacing, etc
        Assert::assertEquals(
            $this->jsonDecode($payload->getRaw()),
            $this->jsonDecode($this->lastResponse->getContent())
        );
        Assert::assertSame((int) $httpCode, $this->lastResponse->getStatusCode());
    }
}
