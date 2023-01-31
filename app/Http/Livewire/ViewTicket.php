<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use App\Models\Response;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewTicket extends Component
{
    public $ticket, $responses, $reply, $response_id, $addResponse = false;

    protected $listeners = [
        'deleteResponseListener' => 'deleteResponse'
    ];
    
    protected $rules = [
        'reply' => 'required'
    ];

    public function mount($id)
    {
        $this->ticket = Ticket::find($id);
        $this->responses = Response::where('ticket_id', $id)
                ->select('id', 'user_id', 'reply', 'status')
                ->latest()
                ->get();
    }

    public function resetFields()
    {
        $this->reply = '';
    }

    public function addResponse()
    {
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
            // session()->flash('success', 'Response deleted successfully');
            $this->notify('Response deleted successfully');
        } catch (\Exception $ex) {
            // session()->flash('error', 'Something went wrong');
            $this->notify('Something went wrong');
        }
    }

    public function render()
    {
        return view('livewire.view-ticket');
    }
}
