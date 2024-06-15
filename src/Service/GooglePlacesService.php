<?php
namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class GooglePlacesService
{
    private $httpClient;
    private $apiKey;

    public function __construct(HttpClientInterface $httpClient, string $apiKey)
    {
        $this->httpClient = $httpClient;
        $this->apiKey = $apiKey;
    }

    public function getNearbyPlaces(float $latitude, float $longitude): array
    {
        $url = sprintf('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=%s,%s&radius=1000&key=%s', $latitude, $longitude, $this->apiKey);

        $response = $this->httpClient->request('GET', $url);
        $data = $response->toArray();

        return $data['results'];
    }
}
