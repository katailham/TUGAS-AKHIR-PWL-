<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Brand;
use App\Models\Categorie;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $limit = 5;
        $brands = [
            [
                'name' => 'EGODEPTH PROJECT',
                'description' => 'berbagai macam produk dari egodepth',
            ],
            [
                'name' => 'SHINING BRIGHT',
                'description' => 'berbagai macam pakaian dari Shining Bright',
            ],
            [
                'name' => 'LENOVO',
                'description' => 'berbagai macam elektronik dari Lenovo',
            ],
        ];

        foreach ($brands as $key => $value) {
            Brand::create($value);
        }

        $categories = [
            [
                'name' => 'PAKAIAN',
                'description' => 'berbagai macam pakaian',
            ],
            [
                'name' => 'ELEKTRONIK',
                'description' => 'berisi berbagai macam jenis Elektronik',
            ],
        ];

        foreach ($categories as $key => $value) {
            Categorie::create($value);
        }

        $roles = [
            [
                'name' => 'Admin',
            ],
            [
                'name' => 'User',
            ],
        ];

        foreach ($roles as $key => $value) {
            Role::create($value);
        }

        $users = [
            [
                'name' => 'Admin A',
                'username' => 'admin_a',
                'email' => 'admin_a@mail.com',
                'password' => Hash::make(123456),
                'photo' => 'admin.jpg',
                'roles_id' => 1
            ],
            [
                'name' => 'User A',
                'username' => 'user_a',
                'email' => 'user_a@mail.com',
                'password' => Hash::make(123456),
                'photo' => 'user.jpg',
                'roles_id' => 2
            ],
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
