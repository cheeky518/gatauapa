<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'uum',
            'email' => 'nadhyy26@gmail.com',
            'password' => bcrypt('35798642')
        ]);
        $admin->assignRole('admin');

        $petugasgudang = User::create([
            'name' => 'nurul',
            'email' => 'nurursiti@gmail.com',
            'password' => bcrypt('86423579')
        ]);
         $petugasgudang->assignRole('petugasgudang');
    
        $apoteker = User::create([
            'name' => 'chika',
            'email' => 'cikanajma15@gmail.com',
            'password' => bcrypt('87654321')
        ]);
         $apoteker->assignRole('apoteker');

         $manajer = User::create([
            'name' => 'manajer',
            'email' => 'chika.nazhmanuari23@gmail.com',
            'password' => bcrypt('12344321')
        ]);
         $manajer->assignRole('manajer');
    
        $kasir = User::create([
            'name' => 'kasir',
            'email' => 'cheeqkaa@gmail.com',
            'password' => bcrypt('12345678')
        ]);
         $kasir->assignRole('kasir');
        }
}