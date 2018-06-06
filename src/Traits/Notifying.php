<?php
namespace NotificationBuilder\Traits;

use NotificationBuilder\Models\Action;
use NotificationBuilder\Notification;
use Illuminate\Support\Collection;

trait Notifying
{
    public $model = __CLASS__;
    public $route;
    public $notifications;
    
    public function __construct()
    {
        $this->route = config('NotificationBuilder.modelRoutes.'.__CLASS__);
        $this->notifications = new Collection;
    }

    public function notifying($action)
    {
        $act = Action::findByModel($this->model, $action);
        if ($act) {
            if ($act->active) {
                foreach ($act->templates as $template) {
                    $notification = new Notification($template, $this);
                    $notification->prepare();
                    $this->notifications->push($notification);
                }
                // dump the notifications collection for now
                $this->notifications->dump();
                exit;
            }
        }
        return "action $action not registered! for $this->model";
    }
}
