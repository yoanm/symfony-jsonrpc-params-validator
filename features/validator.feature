Feature: Validator

  Scenario: Validator should not be invoked for method which does not implement right interface
    When I send following "POST" input on "/json-rpc" demoApp kernel endpoint:
    """
    {"jsonrpc": "2.0", "method": "basicMethod", "id": 1}
    """
    Then I should have a "200" response from demoApp with following content:
    """
    {"jsonrpc":"2.0", "result":"basic-method-result", "id":1}
    """

  Scenario: Validator should not throw exception if there is no violations
    When I send following "POST" input on "/json-rpc" demoApp kernel endpoint:
    """
    {
      "jsonrpc": "2.0",
      "method": "basicMethodWithRequiredParams",
      "params": {
        "fieldA": "plop",
        "fieldB": "plip"
      },
      "id": 1
    }
    """
    Then I should have a "200" response from demoApp with following content:
    """
    {"jsonrpc":"2.0", "result":"basic-method-with-params-result", "id":1}
    """

  Scenario: Validator should return list of violations if there is some
    When I send following "POST" input on "/json-rpc" demoApp kernel endpoint:
    """
    {
      "jsonrpc": "2.0",
      "method": "basicMethodWithRequiredParams",
      "params": {
        "fieldA": null,
        "fieldB": ""
      },
      "id": 1
    }
    """
    Then I should have a "200" response from demoApp with following content:
    """
    {
      "jsonrpc":"2.0",
      "error": {
        "code": -32602,
        "message": "Invalid params",
        "data": {
          "violations": [
            {
              "path": "[fieldA]",
              "message": "This value should not be null.",
              "code": "ad32d13f-c3d4-423b-909a-857b961eb720"
            },
            {
              "path": "[fieldB]",
              "message": "This value should not be blank.",
              "code":"c1051bb4-d103-4f74-8988-acbcafc7fdc3"
            }
          ]
        }
      },
      "id":1
    }
    """
