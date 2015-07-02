<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {
	
	public function run()
{
	 \DB::table('users')->insert(array (
          'name'  => 'laly',
          'email' => 'laly@laly.cl',
          'password' => \Hash::make('laly2814'),
          'created_at' => '2015-06-22',
          'updated_at' => '2015-06-22'
	 	));

}


}

