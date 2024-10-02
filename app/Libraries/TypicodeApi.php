<?php

namespace App\Libraries;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Response;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request;

class TypicodeApi
{
    private string $baseURL;
    public function __construct(
        private readonly Client $httpClient
    )
    {
        $this->baseURL = config('typicode.api_url');
    }


    public function getUsers()
    {
        $url = $this->baseURL . '/users';
        return $this->sendRequest('GET', $url);
    }
    public function getPosts()
    {
        $url = $this->baseURL . '/posts';

        return $this->sendRequest('GET', $url);
    }

    /**
     * Send request
     *
     * @param string $method
     * @param string $uri
     * @param array|null $body
     * @param array $headers
     * @return array|object|null
     *
     * @throws \Exception
     */
    private function sendRequest(
        string $method,
        string $uri,
        ?array $body = null,
        array $headers = []
    ) {
        $options['headers'] = array_merge($this->getRequestHeaders(), $headers);

        if ($body) {
            $options['json'] = $body;
        }

        try {
            $response = $this->httpClient->request($method, $uri, $options);
            return $this->decodeResponse($response);
        } catch (ClientException $e) {
            // throw exception to allow for auth retry
            if ($e->getCode() === Response::HTTP_UNAUTHORIZED) {
                throw new \Exception();
            }

            return null;
        } catch (GuzzleException $e) {

        }
    }

    /**
     * Decode the response
     *
     * @param ResponseInterface $response
     * @return object|null
     */
    private function decodeResponse(ResponseInterface $response)
    {
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Get request headers
     *
     * @return array
     */
    private function getRequestHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }


    /**
     * Send an api request
     *
     * @param string $method
     * @param string $uri
     * @param array|null $body
     * @param array $headers
     * @return object|null
     */
    private function apiRequest(
        string $method,
        string $uri,
        ?array $body = null,
        array $headers = []
    ) {
        $requestUri = $this->apiBaseUri . $uri;

        return $this->sendRequest($method, $requestUri, $body, $headers);
    }

    /**
     * Send an authenticated api request
     *
     * @param string $accessToken
     * @param string $method
     * @param string $uri
     * @param array|null $body
     * @param array $headers
     * @return object|null
     */
    private function apiAuthRequest(
        string $accessToken,
        string $method,
        string $uri,
        ?array $body = null,
        array $headers = []
    ) {
        $headers = array_merge(
            $this->getRequestHeaders(),
            $this->getAuthorizedRequestHeaders($accessToken),
            $headers
        );

        return $this->apiRequest($method, $uri, $body, $headers);
    }

    /**
     * Send an auth request
     *
     * @param string $method
     * @param string $uri
     * @param array|null $body
     * @param array $headers
     * @return object|null
     */
    private function authRequest(
        string $method,
        string $uri,
        ?array $body = null,
        array $headers = []
    ) {
        $requestUri = $this->authBaseUri . $uri;

        return $this->sendRequest($method, $requestUri, $body, $headers);
    }

}
