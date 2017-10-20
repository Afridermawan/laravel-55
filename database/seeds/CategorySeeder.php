<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'  => 'laravel',
            'slug'  =>  str_slug('laravel')
        ]);

        Category::create([
            'name'  => 'php',
            'slug'  =>  str_slug('php')
        ]);

        Category::create([
            'name'  => 'slim',
            'slug'  =>  str_slug('slim')
        ]);
    }
}
