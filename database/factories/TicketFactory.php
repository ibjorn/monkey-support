<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date = fake()->unique()->dateTimeBetween('-7 days', 'now');
        
        return [
            'subject' => fake()->title(),
            'description' => fake()->paragraphs(1, true),
            'status'=> Arr::random(['new', 'open', 'responded', 'closed']),
            'created_at' => $date,
            'updated_at' => $date
        ];
    }
}
