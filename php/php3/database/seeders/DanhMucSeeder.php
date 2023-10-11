<?php

namespace Database\Seeders;

use App\Models\DanhMuc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DanhMuc::factory()->count(10)->create();
    }
}
