# Symfony JSON-RPC params validator

[![License](https://img.shields.io/github/license/yoanm/symfony-jsonrpc-params-validator.svg)](https://github.com/yoanm/symfony-jsonrpc-params-validator)
[![Code size](https://img.shields.io/github/languages/code-size/yoanm/symfony-jsonrpc-params-validator.svg)](https://github.com/yoanm/symfony-jsonrpc-params-validator)
[![Dependabot Status](https://api.dependabot.com/badges/status?host=github\&repo=yoanm/symfony-jsonrpc-params-validator)](https://dependabot.com)

[![Scrutinizer Build Status](https://img.shields.io/scrutinizer/build/g/yoanm/symfony-jsonrpc-params-validator.svg?label=Scrutinizer\&logo=scrutinizer)](https://scrutinizer-ci.com/g/yoanm/symfony-jsonrpc-params-validator/build-status/master)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/yoanm/symfony-jsonrpc-params-validator/master.svg?logo=scrutinizer)](https://scrutinizer-ci.com/g/yoanm/symfony-jsonrpc-params-validator/?branch=master)
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/8f39424add044b43a70bdb238e2f48db)](https://www.codacy.com/gh/yoanm/symfony-jsonrpc-params-validator/dashboard?utm_source=github.com\&utm_medium=referral\&utm_content=yoanm/symfony-jsonrpc-params-validator\&utm_campaign=Badge_Grade)

[![CI](https://github.com/yoanm/symfony-jsonrpc-params-validator/actions/workflows/CI.yml/badge.svg?branch=master)](https://github.com/yoanm/symfony-jsonrpc-params-validator/actions/workflows/CI.yml)
[![codecov](https://codecov.io/gh/yoanm/symfony-jsonrpc-params-validator/branch/master/graph/badge.svg?token=NHdwEBUFK5)](https://codecov.io/gh/yoanm/symfony-jsonrpc-params-validator)
[![Symfony Versions](https://img.shields.io/badge/Symfony-v4.4%20%2F%20v5.4%2F%20v6.x-8892BF.svg?logo=github)](https://symfony.com/)

[![Latest Stable Version](https://img.shields.io/packagist/v/yoanm/symfony-jsonrpc-params-validator.svg)](https://packagist.org/packages/yoanm/symfony-jsonrpc-params-validator)
[![Packagist PHP version](https://img.shields.io/packagist/php-v/yoanm/symfony-jsonrpc-params-validator.svg)](https://packagist.org/packages/yoanm/symfony-jsonrpc-params-validator)

Easy JSON-RPC params validation for [`yoanm/symfony-jsonrpc-http-server`](https://github.com/yoanm/symfony-jsonrpc-http-server)

Symfony bundle for [`yoanm/jsonrpc-params-symfony-validator-sdk`](https://github.com/yoanm/php-jsonrpc-params-symfony-validator-sdk)

See [yoanm/symfony-jsonrpc-params-sf-constraints-doc](https://github.com/yoanm/symfony-jsonrpc-params-sf-constraints-doc) for documentation generation.

## Versions

*   Symfony v3/4 - PHP >=7.1 : `^v1.0`

*   Symfony v4/5 - PHP >=7.2 : `^v2.0`

    ⚠️⚠️ `v0.2.0` is replaced by `v1.0.0` ! ⚠️⚠️

    ⚠️⚠️ `v0.3.0` was badly taggued, used `v2.0.0` instead ! ⚠️⚠️

*   Symfony v4.4/5.4/6.x - PHP ^8.0 : `^v2.1`

## How to use

Once configured, simply send JSON-RPC request to the server and validator will automatically validate params.

See below how to configure it.

## Configuration

Bundle requires only one thing :

*   JSON-RPC Methods which are compatible with
    *   [`yoanm/symfony-jsonrpc-http-server`](https://github.com/yoanm/symfony-jsonrpc-http-server)
    *   and [`yoanm/jsonrpc-params-symfony-validator-sdk`](https://github.com/yoanm/php-jsonrpc-params-symfony-validator-sdk)

Register JSON-RPC methods as described on [`yoanm/symfony-jsonrpc-http-server`](https://github.com/yoanm/symfony-jsonrpc-http-server) documentation.

## Contributing

See [contributing note](./CONTRIBUTING.md)
