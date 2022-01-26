<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\BandcampHelper;
use App\Models\{Quote, BandcampProduct};

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $productNodes = BandcampHelper::getProducts();

        return view('products', [
            'quote'    => Quote::random(),
            'page'     => 'products',
            'products' => BandcampProduct::hydrateFromSource($productNodes)
        ]);
    }
}
