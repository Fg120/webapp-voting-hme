<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        \App\Models\User::create([
            'nim' => '11112222',
            'nama' => $faker->name,
            'email' => '11112222@mail.unej.ac.id',
            'password' => bcrypt('password'),
            'token' => 'password',
            'angkatan' => '2023',
            'is_admin' => '1',
            'already_vote' => '1',
        ]);
        \App\Models\User::create([
            'nim' => '33334444',
            'nama' => $faker->name,
            'email' => '33334444@mail.unej.ac.id',
            'password' => bcrypt('password'),
            'token' => 'password',
            'angkatan' => '2023',
            'is_admin' => '0',
            'already_vote' => '1',
        ]);
    }
}
