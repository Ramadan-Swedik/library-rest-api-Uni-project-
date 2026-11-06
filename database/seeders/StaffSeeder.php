<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    public function run(): void
    {
        Staff::create([
            "name"         => "Ramadan",
            "email"        => "R62@gmail.com",
            "password"     => bcrypt("1062"),
            "phone_number" => "1434567890",
            "role"         => "admin"
        ]);
    }
}
