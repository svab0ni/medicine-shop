<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = new \App\Models\Company();

        $company->name = 'Bosnalijek';
        $company->slug = 'bosnalijek';
        $company->color = 'blue';
        $company->is_published = 1;

        $company->save();
    }
}
