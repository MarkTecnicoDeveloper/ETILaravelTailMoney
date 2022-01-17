<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Usuario Teste',
            'email'     => 'test@test.com',
            'password'  => bcrypt('123456'),
        ]);

        User::create([
            'name'      => 'Usuario Teste 2',
            'email'     => 'test2@test.com',
            'password'  => bcrypt('123456'),
        ]);
    }
}
