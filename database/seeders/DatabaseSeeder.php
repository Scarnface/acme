<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => 'password'
        ]);

        Company::factory(10)->create()->each(function ($company) {
            Employee::factory(100)->create([
                'company_id' => $company->id,
            ]);
        });
    }
}
