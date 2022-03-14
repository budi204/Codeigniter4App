<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for($i = 0; $i < 99; $i++) {

            $data = [
                'name' => $faker->name,
                'num_phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'created_at' => Time::createFromTimestamp($faker->unixTime),
                'updated_at' => Time::now()
            ];
    
            $this->db->table('mahasiswa')->insert($data);
        }

        // $data = [
        //     [
        //     'name' => 'Eka',
        //     'num_phone' => 088378947,
        //     'address'    => 'abcdefgh',
        //     'created_at' => Time::now(),
        //     'updated_at' => Time::now()
        //     ],
        //     [
        //     'name' => 'Dwi',
        //     'num_phone' => 080989789,
        //     'address'    => 'ijklmnop',
        //     'created_at' => Time::now(),
        //     'updated_at' => Time::now()
        //     ]
        // ];

        // Simple Queries
        // $this->db->query("INSERT INTO mahasiswa (name, address, num_phone, created_at, updated_at) VALUES(:name:, :num_phone:, :address:, :created_at:, :updated_at:)", $data);

        // Using Query Builder
        // $this->db->table('mahasiswa')->insertBatch($data);
    }
}