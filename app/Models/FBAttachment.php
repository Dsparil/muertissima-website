<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class FBAttachment extends AbstractHydratableModel
{
    use HasFactory;

    // Media type
    public $type;

    // Target URL
    public $url;

    // URL of picture to display
    public $pictureUrl;

    public $pictureWidth;

    public $sourceUrl;

    public function __construct(\StdClass $data)
    {
        $this->buildBasicInfo($data);

        if (isset($data->media)) {
            $this->buildMedia($data->media);
        }
    }

    private function buildBasicInfo(\StdClass $data)
    {
        $this->type = $data->media_type ?? $data->type;

        if (isset($data->target)) {
            $this->url = trim($data->target->url);
        }
    }

    private function buildMedia(\StdClass $media)
    {
        $this->pictureUrl   = $media->image->src;
        $this->pictureWidth = $media->image->width;

        if (isset($media->source)) {
            $this->sourceUrl = $media->source;
        }
    }

    public function isDisplayable(): bool
    {
        return $this->pictureUrl !== null && $this->url !== null;
    }

    public function eventHasBeenDisplayed(): bool
    {
        return in_array($this->url, FBPost::$displayedEvents);
    }
}
