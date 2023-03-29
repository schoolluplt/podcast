<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Channel::factory(10)->create();

        \App\Models\Channel::factory()->create([
            'name' => 'Lucie Pelletier',
            'email' => 'lucie.pelletier@my-digital-school.org',
            'is_admin' => true,
        ]);
    }
}
