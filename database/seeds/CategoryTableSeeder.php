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
        Category::create(['name' => 'SPORTSWEAR', 'description' => 'This is sportswear category', 'publication_status' => 1]);
        Category::create(['name' => 'MENS', 'description' => 'This is mens category', 'publication_status' => 1]);
        Category::create(['name' => 'WOMENS', 'description' => 'This is womens category', 'publication_status' => 1]);
        Category::create(['name' => 'KIDS', 'description' => 'This is kids category', 'publication_status' => 1]);
        Category::create(['name' => 'FASHION', 'description' => 'This is fashion category', 'publication_status' => 1]);
        Category::create(['name' => 'HOUSEHOLDS', 'description' => 'This is households category', 'publication_status' => 1]);
        Category::create(['name' => 'INTERIORS', 'description' => 'This is interiors category', 'publication_status' => 1]);
        Category::create(['name' => 'CLOTHING', 'description' => 'This is clothing category', 'publication_status' => 1]);
        Category::create(['name' => 'BAGS', 'description' => 'This is bags category', 'publication_status' => 1]);
        Category::create(['name' => 'SHOES', 'description' => 'This is shoes category', 'publication_status' => 1]);
    }
}
