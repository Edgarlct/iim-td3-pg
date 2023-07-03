<?php

declare(strict_types=1);

namespace Iim\td3;

use SebastianBergmann\Type\IterableType;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class Api
{
    private \Symfony\Contracts\HttpClient\HttpClientInterface $client;
    public function __construct()
    {
        $this->client = HttpClient::create();
    }

    /**
     * @param String $search
     * @return Product[]
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @throws \Throwable
     */
    public function getProductResearch(String $search): array
    {
        try {
            $response = $this->client->request(
                'GET',
                "https://ledenicheur.fr/search?search=".$search
            );
            $content = $response->getContent();
            if ($response->getStatusCode() != 200) {
                throw new \Exception("Error while fetching data");
            }

            return $this->formatProduct($content);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * @param String $content
     * @return Product[]
     */
    public function formatProduct(String $content): array
    {
        $crawler = new Crawler($content);
        $crawler = $crawler->filter('li[data-test="ProductCompactListCard"]');
        $products = $crawler->each(function (Crawler $node, $i) {
            try {
                $link = $node->filter('a')->attr('href');
                if ($link !== null && str_contains($link, "?p=")) {
                    $id = explode("?p=", $link)[0];
                } else {
                    $id = 0;
                }
                $name = $node->filter('span[data-test="ProductName"]')->text();
                $rating = $node->filter('div[data-test="Rating"]')->filter('div')->first()->filter('span')->text();
                $price = $node->filter('div')->last()->filter("span")->last()->text();

                if ($id !== null && $link !== null) {
                    return new Product((int)$id, $name, $price, $link, $rating);
                }
                return null;
            } catch (\Throwable $th) {
                return null;
            }
        });

        // filter null values
        $products = array_filter($products, function ($product) {
            return $product != null;
        });

        return $products;
    }
}
