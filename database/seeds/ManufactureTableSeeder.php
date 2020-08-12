<?php

use App\Manufacture;
use Illuminate\Database\Seeder;

class ManufactureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Manufacture::create(['name' => 'ACNE', 'description' => 'This is a acne brand.']);
        Manufacture::create(['name' => 'GRUNE ERDE', 'description' => 'This is a grune erde brand.']);
        Manufacture::create(['name' => 'ALBIRO', 'description' => 'This is a albiro brand.']);
        Manufacture::create(['name' => 'RONHILL', 'description' => 'This is a ronhill brand.']);
        Manufacture::create(['name' => 'ODDMOLLY', 'description' => 'This is a oddmolly brand.']);
        Manufacture::create(['name' => 'BOUDESTIJN', 'description' => 'This is a boudestijn brand.']);
        Manufacture::create(['name' => 'ROSCH CREATIVE CULTURE', 'description' => 'This is a rosch creative culture brand.']);
    }
}
