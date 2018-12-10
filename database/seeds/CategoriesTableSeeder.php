<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Models\Category();

        $name = 'Diabetes';
        $category->name = $name;
        $category->slug = str_slug($name, '-');
        $category->color = 'green';
        $category->is_published = 1;
        $category->order = 1;

        $category->save();

        $category = new \App\Models\Category();

        $name = 'CardioVascular';
        $category->name = $name;
        $category->slug = str_slug($name, '-');
        $category->color = 'red';
        $category->is_published = 1;
        $category->order = 2;
        $category->save();

        $category = new \App\Models\Category();

        $name = 'Weight';
        $category->name = $name;
        $category->slug = str_slug($name, '-');
        $category->color = 'blue';
        $category->is_published = 1;
        $category->order = 3;

        $category->save();

        $category = new \App\Models\Category();

        $name = 'Bones';
        $category->name = $name;
        $category->slug = str_slug($name, '-');
        $category->color = 'black';
        $category->is_published = 1;
        $category->order = 4;

        $category->save();
    }
}
