<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ViewTicket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ViewTicketTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ViewTicket::class);

        $component->assertStatus(200);
    }
}
