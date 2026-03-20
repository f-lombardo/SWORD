<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Site::factory(3)->create();
        Site::factory()->installed()->create();
        Site::factory()->failed()->create();
    }
}
