<?php

namespace Database\Seeders;

use App\Models\PublicationState;
use Illuminate\Database\Seeder;

class PublicationStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PublicationState::insert (
            [
                ['name' => 'Brouillon', 'slug' => 'DRA'],
                ['name' => 'Proposé', 'slug' => 'PRO'],
                ['name' => 'Publié', 'slug' => 'PUB'],
                ['name' => 'Clos', 'slug' => 'CLO'],
                ['name' => 'Archivé', 'slug' => 'ARC']
            ]
        );
    }
}
