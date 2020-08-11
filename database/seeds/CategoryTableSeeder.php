<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'SPORTSWEAR', 'description' => 'This is sportswear category']);
        Category::create(['name' => 'MENS', 'description' => 'This is mens category']);
        Category::create(['name' => 'WOMENS', 'description' => 'This is womens category']);
        Category::create(['name' => 'KIDS', 'description' => 'This is kids category']);
        Category::create(['name' => 'FASHION', 'description' => 'This is fashion category']);
        Category::create(['name' => 'HOUSEHOLDS', 'description' => 'This is households category']);
        Category::create(['name' => 'INTERIORS', 'description' => 'This is interiors category']);
        Category::create(['name' => 'CLOTHING', 'description' => 'This is clothing category']);
        Category::create(['name' => 'BAGS', 'description' => 'This is bags category']);
        Category::create(['name' => 'SHOES', 'description' => 'This is shoes category']);
    }
}
