<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationBuilderTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type');
            $table->morphs('notifiable');
            $table->text('data');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });

        Schema::create('notifiables', function (Blueprint $table) {
            $table->integer('notification_id')->nullable();
            $table->integer('notifiable_id')->nullable();
            $table->string('notifiable_type')->nullable();
        });

        Schema::create('actions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model');
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->boolean('active')->default(true);
        });

        Schema::create('methods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->enum('is_active', ['y','n'])->default('n');
        });

        Schema::create('notifications_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('title')->nullable();
            $table->longText('message')->nullable();
            $table->enum('type', ['danger','success','info','warrning'])->default('info');
            $table->timestamps();
        });

        Schema::create('action_notifications_template', function (Blueprint $table) {
            $table->integer('action_id')->nullable();
            $table->integer('template_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('action_notifications_template');
        Schema::dropIfExists('notifications_templates');
        Schema::dropIfExists('methods');
        Schema::dropIfExists('actions');
        Schema::dropIfExists('notifiables');
        Schema::dropIfExists('notifications');
    }
}
