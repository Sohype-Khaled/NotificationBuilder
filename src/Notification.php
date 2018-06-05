<?php

namespace NotificationBuilder;

class Notification
{
    public $title;
    public $message;
    public $type;
    public $model;
    
    public function __construct($template, $model)
    {
        $this->title = $template->title;
        $this->message = $template->message;
        $this->type = $template->type;
        $this->model = $model;
    }

    public function prepare()
    {
        $this->title = $this->replacePlaceholders($this->title);
        $this->message =  $this->replacePlaceholders($this->message);
        $this->type = $this->type;
    }

    public function replacePlaceholders($text)
    {
        $res = explode(' ', $text);
        foreach ($res as $word) {
            if (strpos($word, ':') !== false) {
                $replace = substr($word, strpos($word, ":")+strlen(':'));
                $text = str_replace($word, ($this->model->$replace), $text);
            }
            if (strpos($word, '@') !== false) {
                $replace = substr($word, strpos($word, "@")+strlen('@'));
                $text = str_replace(
                    $word,
                    "<a href='".(route($this->model->route, [
                            'id' => $this->model->id
                        ]))."'>".($this->model->$replace)."</a>",
                    $text
                );
            }
        }
        return $text;
    }
}
