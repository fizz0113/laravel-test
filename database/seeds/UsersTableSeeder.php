<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'sale',
            'email' => 'sale@exp.test',
            'password' => Hash::make('qqqqqq'),
        ]);

        User::create([
            'name' => 'buy',
            'email' => 'buy@exp.test',
            'password' => Hash::make('qqqqqq'),
        ]);
    }
}
