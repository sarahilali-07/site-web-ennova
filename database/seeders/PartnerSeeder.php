<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partner::create([
            'name' => 'Partner 1',
            'logo' => 'https://via.placeholder.com/150',
            'website' => 'https://partner1.com',
        ]);

        Partner::create([
            'name' => 'Partner 2',
            'logo' => 'https://via.placeholder.com/150',
            'website' => 'https://partner2.com',
        ]);

        Partner::create([
            'name' => 'Partner 3',
            'logo' => 'https://via.placeholder.com/150',
            'website' => 'https://partner3.com',
        ]);
    }
}