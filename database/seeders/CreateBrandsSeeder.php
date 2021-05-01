<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class CreateBrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
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

        foreach ($data as $key => $value) {
            Brand::create($value);
        }
    }
}
