<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class GraphHelper
{
    public static $pageId;

    public static $token;

    private static $apiUrl = 'https://graph.facebook.com/v12.0/';

    public static function initialize()
    {
        self::$pageId = env('FB_PAGE_ID');
        self::$token  = env('FB_PAGE_ACCESS_TOKEN');
    }

    public static function getPosts()
    {
        $fields = self::buildFields([
            'attachments{target,media_type,media,url}',
            'message',
            'created_time'
        ]);

        $url      = self::addToken(self::$apiUrl.'/'.self::$pageId.'/posts?fields='.$fields);
        $response = Http::get($url);

        return $response->object();
    }

    private static function buildFields(array $fields): string
    {
        return implode(',', $fields);
    }

    private static function addToken(string $url): string
    {
        return $url.'&access_token='.self::$token;
    }
}