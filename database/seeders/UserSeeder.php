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
        $user = array([
            'name'     => 'Super Admin',
            'email'    => 'admin@vascomm.co.id',
            'phone'    => '085159911092',
            'role'     => 'ADMIN',
            'password' => Hash::make('vascomm123')
        ], [
            'name'     => 'Sample User',
            'email'    => 'user@vascomm.co.id',
            'phone'    => '085159911091',
            'role'     => 'USER',
            'password' => Hash::make('vascomm123')
        ]);

        foreach($user as $key) {
            User::create($key);
        }
    }
}
