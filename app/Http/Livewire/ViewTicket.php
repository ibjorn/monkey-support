<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use App\Models\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class ViewTicket extends Component
{
    public $ticket, $reply, $response_id, $addResponse = false;

    protected $rules = [
        'reply' => 'required'
    ];

    public function mount($id)
    {
        $this->ticket = Ticket::find($id);
    }

    public function resetFields()
    {
        $this->reply = '';
    }

    public function addResponse()
    {
        if (Gate::denies('respond-ticket', $this->ticket)) {
            abort(403);
        }

        $this->resetFields();
        $this->addResponse = true;
        $this->updateResponse = false;
    }

    public function storeResponse()
    {
        $this->validate();
        try {
            Response::create([
                'user_id' => Auth::id(),
                'ticket_id' => $this->ticket->id,
                'reply' => $this->reply,
            ]);
            if (Auth::user()->is_admin) {
                $this->ticket->update(['status' => 'responded']);
            } else {
                $this->ticket->update(['status' => 'open']);
            }
            $this->notify('Response added successfully');
            $this->resetFields();
            $this->addResponse = false;
        } catch (\Exception $ex) {
            $this->notify('Something went wrong');
        }
    }

    public function cancelResponse()
    {
        $this->addResponse = false;
        $this->updateResponse = false;
        $this->resetFields();
    }

    public function deleteResponse($id)
    {
        try {
            Response::find($id)->delete();
            $this->notify('Response deleted successfully');
        } catch (\Exception $ex) {
            $this->notify('Something went wrong');
        }
    }
    
    public function closeTicket()
    {
        try {
            $this->ticket->update(['status' => 'closed']);
            $this->notify('Ticket closed successfully');
        } catch (Exception $ex) {
            $this->notify('Something went wrong');
        }
    }

    public function render()
    {
        $responses =  Response::where('ticket_id', $this->ticket->id)
        ->select('id', 'user_id', 'reply')
        ->latest()
        ->get();

        if (Gate::denies('view-ticket', $this->ticket)) {
            abort(403);
        }

        return view('livewire.view-ticket', [
            'responses' => $responses
        ]);
    }
}
