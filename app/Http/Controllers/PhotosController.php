<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FBPost;
use App\Helpers\GraphHelper;

class PhotosController extends Controller
{
    public function index(Request $request)
    {
        GraphHelper::initialize();
        $posts = GraphHelper::getPosts();

        if ($posts === null) {
            abort(500, 'Erreur dans la récupération des données.');
        }

        return view('photos', [
            'page'  => 'photos',
            'posts' => FBPost::hydrateFromSource($posts, 'isPhoto')
        ]);
    }
}