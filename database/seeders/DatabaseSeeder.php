<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            RoleAndPermissionSeeder::class,
            UserSeeder::class,
            /* CategorySeeder::class,
            DiseaseSeeder::class,
            BrandSeeder::class, */
            StateSeeder::class,
            LabTestsSeeder::class,
            DoctorTypeSeeder::class,
            MenuItemSeeder::class,
            PageSeeder::class,
            HomePageSeeder::class
        ]);
    }
}
