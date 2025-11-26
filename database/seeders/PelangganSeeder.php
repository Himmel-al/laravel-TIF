<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelanggan::create([
            'first_name' => 'John',
            'last_name'  => 'Doe',
            'birthday'   => '1990-01-01',
            'gender'     => 'male',
            'email'      => 'john.doe@example.com',
            'phone' => '123-456-7890'
        ]);
    }
}
