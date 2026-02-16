<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    public function definition(): array
    {
        return [
            'customer_id' => Customer::factory(),
            'assigned_to' => null,
            'subject' => fake()->sentence(),
            'description' => fake()->paragraph(3),
            'status' => fake()->randomElement(['open', 'in_progress', 'waiting_customer', 'resolved', 'closed']),
            'priority' => fake()->randomElement(['low', 'medium', 'high', 'urgent']),
        ];
    }
}
