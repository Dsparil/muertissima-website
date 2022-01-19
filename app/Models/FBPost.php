<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class FBPost extends AbstractHydratableModel
{
    use HasFactory;

    public $title;

    public $content;

    public $date;

    private $hasMessage = false;

    private $hasDisplayableAttachments = false;

    private $isEvent = false;

    private static $urlRegexp = "@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?).*$)@";

    /**
     * @var FBAttachment[]
     */
    public $attachments;

    public function __construct(\StdClass $data)
    {
        $this->buildBasicInfo($data);
        $this->buildAttachments($data->attachments->data);
    }

    private function buildBasicInfo(\StdClass $data)
    {
        if (isset($data->message)) {
            $this->hasMessage = true;
            $message = $data->message;

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
                $this->attachments = array_merge(
                    $this->attachments,
                    FBAttachment::hydrateFromSource($subdata->subattachments->data)
                );
            }
        }

        foreach ($this->attachments as $attachment) {
            if ($attachment->isDisplayable()) {
                $this->hasDisplayableAttachments = true;
            }
            if ($attachment->type == 'event') {
                $this->isEvent = true;
            }
        }
    }

    public function isEvent(): bool
    {
        return $this->isEvent;
    }

    public function hasMessage(): bool
    {
        return $this->hasMessage;
    }

    public function hasDisplayableAttachments(): bool
    {
        return $this->hasDisplayableAttachments;
    }
}
