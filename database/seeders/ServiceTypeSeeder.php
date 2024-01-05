<?php

namespace Database\Seeders;

use App\Models\ServiceType;
use Illuminate\Database\Seeder;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceType::updateOrCreate(['id' => 1], [
            'id' => 1,
            'name' => 'Creche a Vulso',
            'description' => 'Creche dia a vulso',
            'commission' => null,
            'commission_type' => null,
            'department' => 'daycare',
        ]);
    }
}
