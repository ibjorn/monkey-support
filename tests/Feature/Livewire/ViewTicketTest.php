<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ViewTicket;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ViewTicketTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_component_can_render(): void
    {
        $user = User::factory()->create();
        $ticket = Ticket::factory()->create(['user_id' => $user->id]);

        Livewire::actingAs($user)
            ->test(ViewTicket::class, ['id' => $ticket->id])
            ->assertStatus(200);
    }
}
