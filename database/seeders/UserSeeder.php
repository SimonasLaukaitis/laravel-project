<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            1 => [
                'id' => '1',
                'user_type' => 'client',
                'name' => 'Jonas',
                'surname' => 'Jonaitis',
                'email' => 'jonas@example.com',
            ],
            2 => [
                'id' => '2',
                'user_type' => 'worker',
                'name' => 'Petras',
                'surname' => 'Petraitis',
                'email' => 'petras@example.com',
            ],
            3 => [
                'id' => '3',
                'user_type' => 'admin',
                'name' => 'Vardenis',
                'surname' => 'Pavardenis',
                'email' => 'vardenis@example.com',
            ],
            4 => [
                'id' => '4',
                'user_type' => 'client',
                'name' => 'Laura',
                'surname' => 'Lauraitė',
                'email' => 'laura@example.com',
            ],
            5 => [
                'id' => '5',
                'user_type' => 'worker',
                'name' => 'Gabrielė',
                'surname' => 'Gabraitė',
                'email' => 'gabriele@example.com',
            ],
            6 => [
                'id' => '6',
                'user_type' => 'admin',
                'name' => 'Tomas',
                'surname' => 'Tomauskas',
                'email' => 'tomas@example.com',
            ],
            7 => [
                'id' => '7',
                'user_type' => 'client',
                'name' => 'Elena',
                'surname' => 'Elenaitė',
                'email' => 'elena@example.com',
            ],
            8 => [
                'id' => '8',
                'user_type' => 'worker',
                'name' => 'Marius',
                'surname' => 'Mariūnas',
                'email' => 'marius@example.com',
            ],
            9 => [
                'id' => '9',
                'user_type' => 'admin',
                'name' => 'Rasa',
                'surname' => 'Rasaitė',
                'email' => 'rasa@example.com',
            ],
            10 => [
                'id' => '10',
                'user_type' => 'client',
                'name' => 'Justinas',
                'surname' => 'Justinauskas',
                'email' => 'justinas@example.com',
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert([
                'id' => $user['id'],
                'user_type' => $user['user_type'],
                'name' => $user['name'],
                'surname' => $user['surname'],
                'email' => $user['email'],
            ]);
        }
    }
}
