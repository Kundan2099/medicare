<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new Admin;
        $admin->name = 'Kundan';
        $admin->email = 'kundan@gmail.com';
        $admin->phone = 8999546180;
        $admin->password = Hash::make(12345678);
        $admin->save();
    }
}
