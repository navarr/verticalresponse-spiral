<?php
namespace VerticalResponse\Client;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

class SpiralRequestFactory implements RequestProvider
{
    /** @inheritdoc */
    public function createRequest(
        $method,
        $uri,
        array $headers = [],
        $body = null,
        $version = '1.1'
    ) {
        return new Request($method, $uri, $headers, $body, $version);
    }
}
