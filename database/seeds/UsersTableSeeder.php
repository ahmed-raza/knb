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
        DB::table('users')->insert([
            'name' => 'Raza',
            'email' => 'raza1778@gmail.com',
            'phone' => '+9234567890',
            'password' => bcrypt('password'),
            'pic' => '',
            'bio' => '',
            'rank' => 'admin',
        ]);
    }
}
