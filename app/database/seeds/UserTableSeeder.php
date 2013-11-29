<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'email' => 'mdiasloureiro@gmail.com',
            'password' => Hash::make('password')
        ));
    }
}