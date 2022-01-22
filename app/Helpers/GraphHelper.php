<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;

class GraphHelper
{
    public static $pageId;

    public static $token;

    public static $recursionLimit = null;

    private static $apiUrl = 'https://graph.facebook.com/v12.0/';

    private static $cacheTTL = 2 * 3600;

    public static function initialize()
    {
        self::$pageId = env('FB_PAGE_ID');
        self::$token  = env('FB_PAGE_ACCESS_TOKEN');
    }

    public static function getAboutInfo(): string
    {
        if (!Cache::has('about')) {
            $url      = self::addToken(self::$apiUrl.'/'.self::$pageId.'/?fields=description_html');
            $response = (Http::get($url))->object();

            Cache::put('about', $response->description_html ?? '', self::$cacheTTL);
        }

        return Cache::get('about');
    }

    public static function getPosts(string $customUrl = null): ?Collection
    {
        if (Cache::has('posts')) {
            return Cache::get('posts');
        }

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

        $posts = collect($response->data);

        if (isset($response->paging->next)) {
            $posts = $posts->merge(self::getPosts($response->paging->next));
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