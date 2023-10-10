<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CateRealEstate;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(CateRealEstate::class);

        // \App\Models\CateRealEstate::factory(3)->create();
        // \App\Models\RealEstate::factory(10)->create();
        // \App\Models\CateNews::factory(3)->create();
        // \App\Models\Banner::factory(2)->create();
        // \App\Models\News::factory(5)->create();
        \App\Models\User::factory(3)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
