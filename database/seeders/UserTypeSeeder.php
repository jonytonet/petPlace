<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userTypes = [
            [
                'id' => 1,
                'name' => 'Admin',
                'permissions' => 'master',
            ],
            [
                'id' => 2,
                'name' => 'Veterinário',
                'permissions' => 'vets',
            ],
            [
                'id' => 3,
                'name' => 'Groomer',
                'permissions' => 'groomers',
            ],
            [
                'id' => 4,
                'name' => 'Cliente',
                'permissions' => 'customers',
            ],
            [
                'id' => 5,
                'name' => 'Daycare',
                'permissions' => 'daycare',
            ],
        ];

        foreach ($userTypes as $userType) {
            UserType::updateOrCreate(['id' => $userType['id']], $userType);
        }
    }
}
