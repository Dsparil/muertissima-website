<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FBPost;
use App\Helpers\GraphHelper;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        GraphHelper::initialize(2);
        $posts = GraphHelper::getPosts();

        if ($posts === null) {
            abort(500, 'Erreur dans la récupération des données.');
        }

        return view('home', [
            'page'  => 'home',
            'posts' => FBPost::hydrateFromSource($posts, 'isHomePost')
        ]);
    }
}
