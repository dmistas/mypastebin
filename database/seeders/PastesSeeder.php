<?php

namespace Database\Seeders;

use App\Models\Paste;
use Illuminate\Database\Seeder;

class PastesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paste::factory()->count(20)->create();
    }
}
