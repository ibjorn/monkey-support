<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Tickets extends Component
{
    use WithPagination;

    public $subject, $description, $ticket_id, $updateTicket = false, $addTicket = false;

    protected $listeners = [
        'deleteTicketListener' => 'deleteTicket'
    ];

    protected $rules = [
        'subject' => 'required',
        'description' => 'required',
    ];

    public function resetFields()
    {
        $this->subject = '';
        $this->description = '';
    }

    public function addTicket()
    {
        $this->resetFields();
        $this->addTicket = true;
        $this->updateTicket = false;
    }

    public function storeTicket()
    {
        $this->validate();
        try {
            Ticket::create([
                'user_id' => Auth::user()->id,
                'subject' => $this->subject,
                'description' => $this->description,
            ]);
            // session()->flash('success', 'Ticket created successfully');
            $this->notify('Ticket created successfully');
            $this->resetFields();
            $this->addTicket = false;
        } catch (\Exception $ex) {
            // session()->flash('error', 'Something went wrong');
            $this->notify('Something went wrong');
        }
    }

    public function editTicket($id)
    {
        try {
            $ticket = Ticket::findOrFail($id);
            if(!$ticket) {
                // session()->flash('error', 'Ticket not found');
                $this->notify('Ticket not found');
            } else {
                $this->ticket_id = $ticket->id;
                $this->subject = $ticket->subject;
                $this->description = $ticket->description;
                $this->updateTicket = true;
                $this->addTicket = false;
            }
        } catch (\Exception $ex) {
            // session()->flash('error', 'Something went wrong');
            $this->notify('Something went wrong');
        }
    }

    public function updateTicket()
    {
        $this->validate();
        try {
            Ticket::whereId($this->ticket_id)->update([
                'subject' => $this->subject,
                'description' => $this->description,
            ]);
            // session()->flash('success', 'Ticket updated successfully');
            $this->notify('Ticket updated successfully');
            $this->resetFields();
            $this->updateTicket = false;
        } catch (\Exception $ex) {
            // session()->flash('error', 'Something went wrong');
            $this->notify('Something went wrong');
        }
    }

    public function cancelTicket()
    {
        $this->addTicket = false;
        $this->updateTicket = false;
        $this->resetFields();
    }

    public function deleteTicket($id)
    {
        try {
            Ticket::find($id)->delete();
            // session()->flash('success', 'Ticket deleted successfully');
            $this->notify('Ticket deleted successfully');
        } catch (\Exception $ex) {
            // session()->flash('error', 'Something went wrong');
            $this->notify('Something went wrong');
        }
    }

    public function render()
    {
        return view('livewire.tickets', [
            'tickets' => Ticket::where('user_id', Auth::id())
            ->select('id', 'subject', 'description', 'status')
            ->latest()
            ->paginate(10)
        ]);
    }
}
