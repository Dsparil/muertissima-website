<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\BandcampHelper;

class BandcampProduct extends Model
{
    use HasFactory;

    public $title;

    public $pictureUrl;

    public $price;

    public $url;

    public function __construct(string $title, string $pictureUrl, string $price, string $url)
    {
        $this->title      = trim(utf8_decode($title), "\n");
        $this->pictureUrl = $pictureUrl;
        $this->price      = utf8_decode($price);
        $this->url        = $url;
    }

    public static function hydrateFromSource(\DOMNodeList $nodes): array
    {
        $products = [];

        foreach ($nodes as $node) {
            $products[] = new self(
                BandcampHelper::getTitleFromNode($node),
                BandcampHelper::getImageUrlFromNode($node),
                BandcampHelper::getPriceFromNode($node),
                BandcampHelper::getProductUrlFromNode($node)
            );
        }

        return $products;
    }
}
