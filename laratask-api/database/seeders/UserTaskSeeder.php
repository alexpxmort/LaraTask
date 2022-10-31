<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newUser = [
            'name' => 'Alex Oliveira',
            'email' => 'lexpdigi@gmail.com',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        $idNewUser = DB::table('users')->insertGetId($newUser);

    
        $newTask = [
            'name' => 'test',
            'description' => 'teste',
            'user_id' => $idNewUser,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        DB::table('tasks')->insert($newTask);




    }
}
