<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'username' => 'diggy',
            'email'    => 'chris@scotch.io',
            'password' => Hash::make('awesome'),
        ));
    }

}