<?php

namespace Database\Seeders;

use App\Models\CateRealEstate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CateRealEstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CateRealEstate::factory(5)->create();
    }
}
