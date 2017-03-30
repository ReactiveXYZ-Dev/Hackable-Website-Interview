<?php

use App\User;
use Illuminate\Database\Seeder;

class SuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create Jackie as super user
        $jackie = User::create([
        		'email' => 'jackie@reactive.xyz',
        		'password' => bcrypt("Jackiee1998")
        	]);
        $jackie->super_user = true;
        $jackie->save();
    }
}
