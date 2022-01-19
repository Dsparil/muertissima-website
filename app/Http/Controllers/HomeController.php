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

        if (isset($posts->error) || !isset($posts->data)) {
            abort(500, 'Erreur dans la récupération des données.');
        }

        return view('home', [
            'page'  => 'home',
            'posts' => FBPost::hydrateFromSource($posts->data, 'isHomePost')
        ]);
    }
}
