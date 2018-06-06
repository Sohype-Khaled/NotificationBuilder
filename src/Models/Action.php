<?php

namespace NotificationBuilder\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    public $guarded = [];
    
    public $timestamps = false;

    public function scopeFindByModel($query, $model, $name)
    {
        $action = $query->where('model', $model)->where('name', $name)->first();
        if ($action) {
            return $action;
        }
        return false;
    }

    public function addTemplate(array $attributes = [])
    {
        $this->templates()->create($attributes);
    }

    public function addManyTemplates(array $attributes = [])
    {
        $this->templates()->createMany($attributes);
    }

    public function templates()
    {
        return $this->belongsToMany(
            'NotificationBuilder\Models\NotificationTemplate',
            'action_notifications_template',
            'action_id',
            'template_id'
        );
    }
}
