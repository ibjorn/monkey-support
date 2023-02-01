<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use App\Http\Livewire\DataTable\WithSorting;
use App\Http\Livewire\DataTable\WithCachedRows;
use App\Http\Livewire\DataTable\WithPerPagePagination;

class ManageTickets extends Component
{
    use WithPerPagePagination, WithSorting, WithCachedRows;

    public $search = '';
    public $filters = [
        'search' => '',
        'status' => '',
    ];

    protected $queryString = ['search', 'sorts', 'filters'];

    protected $listeners = [
        'refreshTickets' => '$refresh',
        'deleteTicketListener' => 'deleteTicket'
    ];

    public function updatedFilters()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset('filters');
    }

    public function getRowsQueryProperty()
    {
        $query = Ticket::query()
        // ->orderBy('created_at', 'desc')
        ->when($this->filters['status'], fn ($query, $status) => $query->where('status', $status))
        ->when($this->filters['search'], fn ($query, $search) => $query
            ->where('id', 'like', '%'.$search.'%')
            ->orWhere('subject', 'like', '%'.$search.'%'));

        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }

    public function deleteTicket($id)
    {
        try {
            Ticket::find($id)->delete();
            $this->notify('Ticket deleted successfully');
        } catch (\Exception $ex) {
            $this->notify('Something went wrong');
        }
    }

    public function render()
    {
        if (Gate::denies('admin-rights')) {
            abort(403);
        }
        
        $statuses = Ticket::STATUSES;

        return view('livewire.manage-tickets', [
            'tickets' => $this->rows,
            'statuses' => $statuses
        ]);
    }
}
