<?php

use App\User;
use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        User::truncate();

        $data = [];

        array_push($data, [
            'name'     => 'Superadmin',
            'email'    => 'superadmin@mail.com',
            'password' => bcrypt('123456'),
            'role'     => 5,
            'active'     => 1,
            'avatar'   => 'admin.png',
        ]);

        array_push($data, [
            'name'     => 'user',
            'email'    => 'user@mail.com',
            'password' => bcrypt('123456'),
            'role'     => 0,
            'active'     => 1,
            'avatar'   => 'parents.png',
        ]);

        User::insert($data);
    }
}
