<?php

use Illuminate\Database\Seeder;
use Agrinesia\Models\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'Active',
            'Inactive',
            'New',
            'On Process - Finance',
            'On Process - Area Manager',
            'Completed'
        ];

        foreach($statuses as $status) {
            Status::create(['status_name' => $status]);
        }
    }
}
