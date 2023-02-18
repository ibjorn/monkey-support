<?php

namespace App\Http\Livewire\Components;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TicketForm extends Component
{
    public $subject, $description, $submitTicket = false;

    protected $rules = [
        'subject' => 'required',
        'description' => 'required',
    ];

    public function resetFields()
    {
        $this->subject = '';
        $this->description = '';
    }

    public function submitTicket()
    {
        $this->resetFields();
        $this->submitTicket = true;
    }

    public function saveTicket()
    {
        $this->validate();
        try {
            Ticket::create([
                'user_id' => Auth::id(),
                'subject' => $this->subject,
                'description' => $this->description,
            ]);
            
            $this->notify('Ticket created successfully');
            $this->resetFields();
            $this->submitTicket = false;

        } catch (\Exception $ex) {
            $this->notify('Something went wrong');
        }
    }

    public function cancelTicket()
    {
        $this->submitTicket = false;
        $this->resetFields();

        return redirect()->route('ticket');
    }

    public function render()
    {
        return view('livewire.components.ticket-form');
    }
}
