<?php
namespace NotificationBuilder\Traits;

use NotificationBuilder\Models\Action;

trait Notifying
{
    public $model = __CLASS__;
    public $modelRoute;

    public function notifying($action)
    {
        $act = Action::findByModel($this->model, $action);
        if ($act) {
            if ($act->active) {
                foreach ($act->notificationTemplates as $template) {
                    $notifications[] = $this->prepare($template);
                }
                return $notifications[1]['message'];
            }
        }
        return "action $action not registered! for $this->model";
    }

    public function prepare($template)
    {
        $title = $this->replacePlaceholders($template->title);
        $message =  $this->replacePlaceholders($template->message);
        $type = $template->type;
        return [
            'title' => $title,
            'message' => $message,
            'type' => $type
        ];
    }

    public function replacePlaceholders($text)
    {
        $res = explode(' ', $text);
        foreach ($res as $word) {
            if (strpos($word, ':') !== false) {
                $replace = substr($word, strpos($word, ":")+strlen(':'));
                $text = str_replace($word, ($this->$replace), $text);
            }
            if (strpos($word, '@') !== false) {
                $replace = substr($word, strpos($word, "@")+strlen('@'));
                $text = str_replace($word, "<a href=".($this->id).">".($this->$replace)."</a>", $text);
            }
        }
        return $text;
    }
}
