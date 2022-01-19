<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class BandcampHelper
{
    private static $url = 'https://muertissima.bandcamp.com';

    private static $xpath;

    public static function getProducts(): \DOMNodeList
    {
        $response = Http::get(self::$url.'/merch');
        $bandcamp = new \DOMDocument();

        libxml_use_internal_errors(true);
        $bandcamp->loadHTML($response->body());
        libxml_clear_errors();

        self::$xpath = new \DOMXPath($bandcamp);
        return self::$xpath->query('//li[@data-item-id]');
    }

    public static function getProductUrlFromNode(\DOMElement $node): ?string
    {
        $nodeList = self::$xpath->query('a', $node);

        $href = $nodeList->item(0)->getAttribute('href') ?? null;

        if ($href === null) {
            return null;
        }

        return self::$url.$href;
    }

    public static function getImageUrlFromNode(\DOMElement $node): ?string
    {
        $nodeList = self::$xpath->query('a/div/img', $node);

        return $nodeList->item(0)->getAttribute('src') ?? null;
    }

    public static function getTitleFromNode(\DOMElement $node): ?string
    {
        $nodeList = self::$xpath->query('a/p[@class="title"]', $node);

        return $nodeList->item(0)->nodeValue ?? null;
    }

    public static function getPriceFromNode(\DOMElement $node): ?string
    {
        $nodeList = self::$xpath->query('p/span[@class="price"]', $node);

        return $nodeList->item(0)->nodeValue ?? null;
    }
}