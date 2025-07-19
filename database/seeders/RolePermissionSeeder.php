<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset permission cache
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Daftar permission yang akan dibuat
        $permissions = [
            'show obat',
            'tambah obat',
            'edit obat',
            'hapus obat',
        ];

        // Buat permission dengan guard_name
        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        // Buat role dengan guard_name 'web'
        $admin    = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $petugas  = Role::firstOrCreate(['name' => 'Petugasgudang', 'guard_name' => 'web']);
        $apoteker = Role::firstOrCreate(['name' => 'apoteker', 'guard_name' => 'web']);
        $manajer  = Role::firstOrCreate(['name' => 'manajer', 'guard_name' => 'web']);
        $kasir    = Role::firstOrCreate(['name' => 'kasir', 'guard_name' => 'web']);

        // Assign permission ke role admin
        $admin->syncPermissions($permissions);

        // Assign permission khusus ke Petugasgudang
        $petugas->syncPermissions([
            'show obat',
            'tambah obat',
            'edit obat',
        ]);
    }
}
