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
        // Reset cache permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Buat daftar permission
        $permissions = [
            'lihat-obat', 'tambah-obat', 'edit-obat', 'hapus-obat',
            'stok-masuk', 'stok-keluar', 'lihat-stok',
            'kelola-kategori', 'kelola-satuan',
            'lihat-laporan-stok', 'lihat-laporan-transaksi', 'export-laporan',
            'kelola-user', 'kelola-role', 'atur-permission',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Buat role
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $petugas = Role::firstOrCreate(['name' => 'Petugasgudang']);
        $apoteker = Role::firstOrCreate(['name' => 'apoteker']);
        $manajer = Role::firstOrCreate(['name' => 'manajer']);
        $kasir = Role::firstOrCreate(['name' => 'kasir']);

        // Assign permission ke masing-masing role
        $admin->syncPermissions($permissions);

        $petugas->syncPermissions([
            'lihat-obat', 'tambah-obat', 'edit-obat',
            'stok-masuk', 'stok-keluar', 'lihat-stok',
            'kelola-kategori', 'kelola-satuan'
        ]);

        $apoteker->syncPermissions([
            'lihat-obat', 'lihat-stok', 'lihat-laporan-stok', 'lihat-laporan-transaksi'
        ]);

        $manajer->syncPermissions([
            'lihat-laporan-stok', 'lihat-laporan-transaksi', 'export-laporan'
        ]);

        $kasir->syncPermissions([
            'stok-keluar', 'lihat-obat', 'lihat-stok'
        ]);
    }
}
