<?php

namespace NotificationBuilder\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationTemplate extends Model
{
    public $guarded = [];
    
    protected $table = 'notifications_templates';


    public function actions()
    {
        return $this->belongsToMany(
            'NotificationBuilder\Models\Action',
            'action_notifications_template',
            'template_id',
            'action_id'
        );
    }
}
