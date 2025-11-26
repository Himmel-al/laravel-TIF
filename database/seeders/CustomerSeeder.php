<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'address_line' => '123 Main St',
            'city' => 'Sample City',
            'state' => 'Sample State',
            'postal_code' => '12345',
            'country' => 'Sample Country',
            'membership_type' => 'Gold',
            'registration_date' => '2023-01-01',
            'last_purchase_date' => '2023-06-01',
            'total_spent' => 1000,
            'preferred_contact_method' => 'email',
        ]);
    }
}
