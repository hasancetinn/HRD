<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 1)->create(['id' => 1, 'email' => 'hcetin@email.com']);
        factory(\App\User::class, 1)->create(['id' => 2, 'email' => 'hcetin1@email.com']);
        factory(\App\User::class, 1)->create(['id' => 3, 'email' => 'hcetin2@email.com']);

        factory(\App\Order::class, 30)->create(
            [
                'user_id' => random_int(1, 3)
            ]
        );
    }
}
