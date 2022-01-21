<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FBPost;
use App\Helpers\GraphHelper;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        GraphHelper::initialize();
        $posts = GraphHelper::getPosts();

        if ($posts === null) {
            abort(500, 'Erreur dans la récupération des données.');
        }

        return view('home', [
            'page'  => 'home',
            'posts' => FBPost::hydrateFromSource($posts, 'isHomePost')->slice(0, 30)
        ]);
    }

    public function about(Request $request)
    {
        GraphHelper::initialize();
        $posts = GraphHelper::getPosts();

        if ($posts === null) {
            abort(500, 'Erreur dans la récupération des données.');
        }

        return view('about', [
            'page'  => 'about',
            'posts' => FBPost::hydrateFromSource($posts, 'isLineup')->reverse()
        ]);
    }
}
