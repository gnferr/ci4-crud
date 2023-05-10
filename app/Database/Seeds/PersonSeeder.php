<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PersonSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 20; $i++) {
            $data = [
                'name' => $faker->name,
                'phone'    => $faker->phoneNumber,
                'email'    => $faker->email,
                'address'    => $faker->address,
                'city'    => $faker->city,
                'country'    => $faker->country,
            ];
            $this->db->table('person')->insert($data);
        }

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
    }
}
