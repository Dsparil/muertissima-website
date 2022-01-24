<?php

namespace App\Helpers;

class PartnersHelper
{
    public function getList(): array
    {
        return [
            'Macchabee Artworks' => [
                'link'  => 'https://www.facebook.com/Macchabeeartworks',
                'image' => asset('images/logo_macchabee_artworks.jpg')
            ],
            'Music Records' => [
                'link'  => 'https://www.facebook.com/musicsarl',
                'image' => asset('images/logo_musicrecords.jpg')
            ],
            'Plonks Plectre' => [
                'link'  => 'https://www.facebook.com/Ponks-Plectre-421674218030046/',
                'image' => asset('images/logo_plonksplectre.jpg')
            ],
            'Skull Strings' => [
                'link'  => 'https://www.facebook.com/Skull-strings-251728064891276',
                'image' => asset('images/logo_skullstrings.jpg')
            ],
            'Lower Tones Place Studios' => [
                'link'  => 'https://www.facebook.com/lowertonesplace/',
                'image' => asset('images/logo_lowertones.jpg')
            ],
            'Milky Way Productions' => [
                'link'  => 'https://www.facebook.com/Milkyprod/',
                'image' => asset('images/logo_milkyway.png')
            ],
            'Fledfine photographie' => [
                'link'  => 'https://www.facebook.com/fledfine',
                'image' => asset('images/logo_fledfine.png')
            ],
            'Covent Garden Studios' => [
                'link'  => 'https://www.facebook.com/CGS95',
                'image' => asset('images/logo-covent.jpg')
            ],
            'Les studios Vallet' => [
                'link'  => 'https://www.facebook.com/LesStudiosVallet',
                'image' => asset('images/logo_studiosvallet.jpg')
            ],
        ];
    }
}