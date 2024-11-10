<?php

namespace Database\Seeders;

use App\Models\User;
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
       $user = [
        [
            'name' => 'Kasir',
            'email' => 'kasir@example.com',
            'username' => 'kasir',
            'password' => Hash::make('kasir'),
            'level' => 'kasir'
        ],

        [
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'username' => 'admin',
            'password' => bcrypt('123'),
            'level' => 'admin'
        ],
     ];

     foreach ($user as $id => $data) {
        User::factory()->create($data);
     }
  }
}
