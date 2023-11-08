<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'SimonARG',
            'email' => 'simonchasnovsky@gmail.com',
            'password' => Hash::make('Spore.Midori12Mercadito'),
            'avatar_uri' => 'default.webp'
        ]);
        $admin->assignRole('admin');

        $mod = User::create([
            'name' => 'Pachorra',
            'email' => 'pachorra@gmail.com',
            'password' => Hash::make('Spore.Midori12Mercadito'),
            'avatar_uri' => 'default.webp'
        ]);
        $mod->assignRole('mod');
    }
}
