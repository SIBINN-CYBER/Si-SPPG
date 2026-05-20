<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class HashAdminPasswordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = Admin::all();
        foreach ($admins as $admin) {
            // Check if it's already hashed (bcrypt hashes start with $2y$)
            if (!str_starts_with($admin->password, '$2y$')) {
                $admin->password = Hash::make($admin->password);
                $admin->save();
            }
        }
    }
}
