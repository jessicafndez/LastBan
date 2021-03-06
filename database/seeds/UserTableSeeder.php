<?php
use Illuminate\Database\Seeder;

use App\User;

class UserTableSeeder extends Seeder {

    public function run() {
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'Chris Sevilleja',
            'username' => 'jess',
            'email'    => 'chris@scotch.io',
            'password' => Hash::make('awesome'),
        ));
    }
    
}


?>