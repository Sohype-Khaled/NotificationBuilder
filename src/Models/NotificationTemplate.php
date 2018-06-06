<?php

namespace NotificationBuilder\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationTemplate extends Model
{
    public $guarded = [];
    
    protected $table = 'notifications_templates';

    // public static function create(array $attributes = [])
    // {
    //     if (is_array(config('NotificationBuilder.locale'))) {
    //         $locale = isset($attributes['locale']) ?
    //             $attributes['locale'] : config('NotificationBuilder.fallback_locale');
    //     } else {
    //         # create if not array
    //     }
    //     static::query()->create(attributes);
    // }

    // $action->notificationTemplates()->create([
    //      'title' => [
    //          'en' => 'en noti. title',
    //          'ar' => 'ar noti. title',
    //      ],
    //      'message' => [
    //          'en' => 'message',
    //          'ar' => 'message',
    //      ],
    //      'type' => 'info',
    // ]);
    
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
