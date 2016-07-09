<?php
namespace VerticalResponse\Client;

use GuzzleHttp\Psr7\Response;
use Jgut\Spiral\Client;
use Jgut\Spiral\Transport;
use Psr\Http\Message\RequestInterface;

class SpiralClient implements HttpClient
{
    /** @var Transport */
    private $transport;

    /**
     * SpiralClient constructor.
     *
     * @param Transport|null $transport
     */
    public function __construct(Transport $transport = null)
    {
        if (is_null($transport)) {
            $transport = Transport\Curl::createFromDefaults();
        }
        $this->transport = $transport;
    }

    /** @inheritdoc */
    public function send(RequestInterface $request)
    {
        $spiral = new Client($this->transport);
        $response = new Response();
        $spiral->request($request, $response);
        return $response;
    }
}
