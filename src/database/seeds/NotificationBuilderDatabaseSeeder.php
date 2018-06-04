<?php

use Illuminate\Database\Seeder;

class NotificationBuilderDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(NotificationBuilderActionsTableSeeder::class);
    }
}
