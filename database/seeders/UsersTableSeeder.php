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

        for ($i = 1; $i <= 500; $i++) {
            \App\Models\User::create([
                'nim'    => rand(0, 99999999),
                'nama'    => $faker->name,
                'email'    => Str::random(10) . '@mail.unej.ac.id',
                'password'    => bcrypt('secret'),
                'token'    => 'secret',
                'angkatan'    => '2023',
                'is_admin'    => '0',
                'already_vote'    => '1',
            ]);
        }
    }
}
