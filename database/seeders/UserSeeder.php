<?php

namespace Database\Seeders;

use App\Constants\UserType;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'admin@example.com',
            'type' => UserType::ADMIN->value,
        ]);
    }
}
