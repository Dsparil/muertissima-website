<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Collection;

class FBPost extends AbstractHydratableModel
{
    use HasFactory;

    public $title;

    public $content;

    public $date;

    private $hasDisplayableAttachments = false;

    private $isEvent = false;

    private $isDisplayableEvent = false;

    private static $urlRegexp = "@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?).*$)@";

    public static $displayedEvents = [];

    /**
     * @var FBAttachment[]
     */
    public $attachments;

    public function __construct(\StdClass $data)
    {
        $this->buildBasicInfo($data);

        if (isset($data->attachments)) {
            $this->buildAttachments($data->attachments->data);
        }
    }

    public function isHomePost(): bool
    {
        return  !$this->isEvent() && 
                !$this->isInterview() &&
                !$this->isPhoto() && (
                    $this->hasMessage() || 
                    $this->hasDisplayableAttachments()
                );
    }

    public function isPhoto(): bool
    {
        return  $this->attachments instanceof Collection &&
                $this->attachments->count() > 3 &&
                $this->hasMessage() &&
                strpos($this->content, 'bandcamp') === false
        ;
    }

    public function isInterview(): bool
    {
        return strpos(strtolower($this->title), 'interview') !== false;
    }

    public function isEvent(): bool
    {
        return $this->isEvent;
    }

    public function isDisplayableEvent(): bool
    {
        return $this->isDisplayableEvent;
    }

    public function hasMessage(): bool
    {
        return $this->content !== null;
    }

    public function hasDisplayableAttachments(): bool
    {
        return $this->hasDisplayableAttachments;
    }

    private function buildBasicInfo(\StdClass $data)
    {
        if (isset($data->message)) {
            $message       = $data->message;
            $this->title   = substr($message, 0, strpos($message, "\n"));
            $content       = trim(substr($message, strpos($message, "\n")), "\n");
            $this->content = preg_replace(self::$urlRegexp, ' ', $content);
        }

        $this->date = date('d/m/Y H:i:s', strtotime($data->created_time));
    }

    private function buildAttachments(array $data)
    {
        $this->attachments = FBAttachment::hydrateFromSource($data);

        foreach ($data as $subdata) {
            if (isset($subdata->subattachments)) {
                $this->attachments = $this->attachments->mergeRecursive(FBAttachment::hydrateFromSource($subdata->subattachments->data));
            }
        }

        $this->calculateFlagsFromAttachments();
    }

    private function calculateFlagsFromAttachments()
    {
        foreach ($this->attachments as $attachment) {
            if ($attachment->isDisplayable()) {
                $this->hasDisplayableAttachments = true;
            }

            if ($attachment->type == 'event' && $this->hasMessage()) {
                if (!$attachment->eventHasBeenDisplayed()) {
                    $this->isDisplayableEvent = true;
                }

                self::$displayedEvents[] = $attachment->url;
                $this->isEvent           = true;
            }
        }
    }
}
