<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class GraphHelper
{
    public static $pageId;

    public static $token;

    public static $recursionLimit = null;

    private static $apiUrl = 'https://graph.facebook.com/v12.0/';

    private static $cacheTTL = 3600;

    private static $recursionCount = 0;

    public static function initialize(int $recursionLimit = null)
    {
        self::$pageId = env('FB_PAGE_ID');
        self::$token  = env('FB_PAGE_ACCESS_TOKEN');

        if ($recursionLimit !== null) {
            self::$recursionLimit = $recursionLimit;
        }
    }

    public static function getPosts(string $customUrl = null)
    {
        if (Cache::has('posts')) {
            return Cache::get('posts');
        }

        if (self::$recursionLimit !== null && self::$recursionCount >= self::$recursionLimit) {
            return [];
        }

        self::$recursionCount++;

        $fields = self::buildFields([
            'attachments{target,media_type,media,url,subattachments}',
            'message',
            'created_time'
        ]);

        $url      = self::addToken(self::$apiUrl.'/'.self::$pageId.'/posts?fields='.$fields);
        $response = (Http::get($customUrl ?? $url))->object();

        if (isset($response->error) || !isset($response->data)) {
            return null;
        }

        $posts = $response->data;

        if (isset($response->paging->next)) {
            $posts = array_merge($posts, self::getPosts($response->paging->next));
        }

        Cache::put('posts', $posts, self::$cacheTTL);

        return $posts;
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