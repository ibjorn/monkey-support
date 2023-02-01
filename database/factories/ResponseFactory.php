<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Response>
 */
class ResponseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date = fake()->unique()->dateTimeBetween('-7 days', 'now');
        
        $ticket = Ticket::inRandomOrder()->first();
        return [
            'ticket_id' => $ticket->id,
            'user_id' => $ticket->user_id,
            'reply' => fake()->paragraphs(1, true),
            'created_at' => $date,
            'updated_at' => $date
        ];
    }
}
