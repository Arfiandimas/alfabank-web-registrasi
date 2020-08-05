<?php

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Database\Seeder;

class InboxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Factory
        factory('App\Inbox',10)->create();
    }
}
