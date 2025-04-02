<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		$users = [
			[
				'name'       => 'Admin',
				'firstname' => 'Admin',
				'email'      => 'admin@example.com',
				'role'       => 'admin',
				'created_at' => Carbon::now()->subYears(3),
				'updated_at' => Carbon::now()->subYears(3),
			],
			[
				'name' => 'Admin',
				'firstname' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456789'), // password
                'role' => 'admin',
                'created_at' => Carbon::now()->subYears(2),
				'updated_at' => Carbon::now()->subYears(2),
            ],

			[
				'name' => 'Admin',
                'email' => 'admin1@gmail.com',
                'password' => bcrypt('123456789'), // password
                'role' => 'redac',
                'created_at' => Carbon::now()->subYears(2),
				'updated_at' => Carbon::now()->subYears(2),
            ],
			[
				'name'       => 'Redac',
				'email'      => 'redac@example.com',
				'role'       => 'redac',
				'created_at' => Carbon::now()->subYears(3),
				'updated_at' => Carbon::now()->subYears(3),
			],
			[
				'name'       => 'User',
				'email'      => 'user@example.com',
				'role'       => 'user',
				'created_at' => Carbon::now()->subYears(2),
				'updated_at' => Carbon::now()->subYears(2),
			],

			//User::factory()->count(4)->create();
		];

		User::factory()->count(14)->create();



        foreach ($users as $userData) {
			User::factory()->create($userData);
		}
	}
}
