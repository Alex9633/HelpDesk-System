<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::factory(5)->create();

        $customers = Customer::factory(20)->create();

        foreach (range(1, 50) as $i) {
            Ticket::factory()->create([
                'customer_id' => $customers->random()->id,
                'assigned_to' => fake()->boolean(70) ? $users->random()->id : null, // 70% assigned
            ]);
        }
    }
}
