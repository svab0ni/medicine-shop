<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\User();

        $user->name = 'Ermin';
        $user->email = 'ermin.sabotic96@gmail.com';
        $user->email_verified_at = now();
        $user->password = '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'; // secret
        $user->remember_token = str_random(10);

        $user->save();

        $users = factory(App\Models\User::class, 50)->make();

        $users->each(function ($item) {
            $item->save();
        });
    }
}
