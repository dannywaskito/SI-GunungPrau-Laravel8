<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'name'=>'Admin',
                'email'=>'dannywaskito10@gmail.com',
                'no_hp'=>'089502516131',
                'role'=>'1',
                'password'=>bcrypt('rahasia123'),
            ],
            [
                'name'=>'User',
                'email'=>'waskitodanny14@gmail.com',
                'no_hp'=>'089502516131',
                'role'=>'2',
                'password'=>bcrypt('rahasia123'),
            ]
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
