<?php

namespace Database\Seeders;
use App\Models\Categorie;
use Illuminate\Database\Seeder;

class CreateCategoriesSeeder extends Seeder
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
                'name' => 'PAKAIAN',
                'description' => 'berbagai macam pakaian',
            ],
            [
                'name' => 'ELEKTRONIK',
                'description' => 'berisi berbagai macam jenis Elektronik',
            ],
        ];

        foreach ($data as $key => $value) {
            Categorie::create($value);
        }
    }
}
