<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\BandcampHelper;
use App\Models\BandcampProduct;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $productNodes = BandcampHelper::getProducts();

        return view('products', [
            'page'     => 'products',
            'products' => BandcampProduct::hydrateFromSource($productNodes)
        ]);
    }
}
