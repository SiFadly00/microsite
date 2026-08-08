<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Link;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name'     => 'Admin BioLink',
            'email'    => 'admin@biolink.com',
            'password' => Hash::make('password123'), // Enkripsi hashing Bcrypt / Argon2
        ]);

        Link::factory(10)->create();

    }
}
