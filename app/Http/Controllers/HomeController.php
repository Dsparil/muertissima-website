<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FBPost;
use App\Helpers\GraphHelper;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function __construct()
    {
        GraphHelper::initialize();
    }

    public function index(Request $request)
    {
        return view('home', [
            'page'  => 'home',
            'posts' => FBPost::hydrateFromSource($this->getPosts(), 'isHomePost')->slice(0, 30)
        ]);
    }

    public function about(Request $request)
    {
        return view('about', [
            'page'  => 'about',
            'posts' => FBPost::hydrateFromSource($this->getPosts(), 'isLineup')->reverse(),
            'about' => GraphHelper::getAboutInfo()
        ]);
    }

    public function interviews(Request $request)
    {
        return view('interviews', [
            'page'  => 'interviews',
            'posts' => FBPost::hydrateFromSource($this->getPosts(), 'isInterview')
        ]);
    }

    public function photos(Request $request)
    {
        return view('photos', [
            'page'  => 'photos',
            'posts' => FBPost::hydrateFromSource($this->getPosts(), 'isPhoto')
        ]);
    }

    public function music(Request $request)
    {
        return view('music', ['page' => 'music']);
    }

    public function shows(Request $request)
    {
        return view('shows', [
            'page'  => 'shows',
            'posts' => FBPost::hydrateFromSource($this->getPosts(), 'isDisplayableEvent')
        ]);
    }

    private function getPosts(): Collection
    {
        $posts = GraphHelper::getPosts();

        if ($posts === null) {
            abort(500, 'Erreur dans la récupération des données.');
        }

        return $posts;
    }
}
