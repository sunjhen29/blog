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
    	DB::statement('SET FOREIGN_KEY_CHECKS=0');

        //reset the users table
        DB::table('users')->truncate();

        //generate 3 users/author
        DB::table('users')->insert([
        	[
        		'name' => "Sunday Doctolero",
        		'email' => "sunjhen29@yahoo.com",
        		'password' => bcrypt('forever')
	       	],
	       	[
        		'name' => "Jennifer Doctolero",
        		'email' => "jennifer@yahoo.com",
        		'password' => bcrypt('forever')
	       	],
	       	[
        		'name' => "Jhen Doctolero",
        		'email' => "jhen@yahoo.com",
        		'password' => bcrypt('forever')
	       	],
        ]);

    }
}
