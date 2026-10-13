<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

/** Semua akun demo memakai password: "password" */
class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->admin()->create(['name' => 'Admin Dev Store', 'email' => 'admin@devstore.test']);
        User::factory()->editor()->create(['name' => 'Editor Satu', 'email' => 'editor@devstore.test']);
        User::factory()->editor()->create(['name' => 'Editor Dua', 'email' => 'editor2@devstore.test']);
        User::factory()->create(['name' => 'Pengguna Demo', 'email' => 'user@devstore.test']);

        User::factory(7)->create();
    }
}
