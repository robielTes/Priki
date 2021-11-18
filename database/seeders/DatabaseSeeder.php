<?php

namespace Database\Seeders;

use App\Models\Domain;
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
        $this->call([
            DomainSeeder::class,
            OpinionSeeder::class,
            PraticeSeeder::class,
            PublicationstateSeeder::class,
            ReferenceSeeder::class,
            RoleSeeder::class,
            UserSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
