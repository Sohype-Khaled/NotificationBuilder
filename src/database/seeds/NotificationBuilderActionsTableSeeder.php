<?php

use Illuminate\Database\Seeder;

class NotificationBuilderActionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actions')->truncate();
        
        // your row goes here
        /**
         * [
         *    'model' => 'User', // model name
         *    'name' => 'Create', // lowercase with Capital Starting Char
         *     action name (if more than one word then CamelCase)
         *    'description' => 'your discription', // optional
         *    'active' => true // boolean (default true) optional
         * ]
         */
        $actions = [
            [
                'model' => 'App\User',
                'name' => 'Create',
                'description' => 'Triggered when creating new user',
                'active' => true,
            ],
        ];
        // end of your rows

        foreach ($actions as $action) {
            $row = [
                'model' => $action['model'],
                'name' => $action['name']
            ];
            if (isset($action['description'])) {
                $row['description'] = $action['description'];
            }
            if (isset($action['active'])) {
                $row['active'] = $action['active'];
            }
            DB::table('actions')->insert($row);
        }
    }
}
