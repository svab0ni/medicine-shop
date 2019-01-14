<?php

use Illuminate\Database\Seeder;

class DeliveryStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new \App\Models\DeliveryStatus();

        $status->name = 'Not assigned';

        $status->save();

        $status = new \App\Models\DeliveryStatus();

        $status->name = 'Getting Medicine';

        $status->save();

        $status = new \App\Models\DeliveryStatus();

        $status->name = 'On my way to deliver medicine';

        $status->save();

        $status = new \App\Models\DeliveryStatus();

        $status->name = 'Done';

        $status->save();
    }
}
