<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LegiScan\Bill;
use App\Traits\Livewire\WithPerPagePagination;

class BillTable extends Component
{
    use WithPerPagePagination;

    protected $queryString = [
        'search' => ['initial' => null, 'as' => 'q'],
    ];

    public $stateId;

    public $search = null;

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function query()
    {
        return Bill::query()
            ->when(
                $this->stateId,
                fn ($query) => $query->where('state_id', $this->stateId)
            );
    }

    public function applyFilters($query)
    {
        return $query
            ->when(
                $this->search,
                fn ($query) => $query
                    ->where(
                        fn ($subquery) => $subquery
                            ->where('bill_number', 'like', '%' . $this->search . '%')
                            ->orWhere('title', 'like', '%' . $this->search . '%')
                            ->orWhere('description', 'like', '%' . $this->search . '%')
                    )
            );
    }

    public function render()
    {
        $billCount  = $this->query()->count();
        $bills      = $this->applyPagination(
            $this->applyFilters($this->query()->orderByDesc('status_date'))
        );

        $has_filters = $this->hasFilters();

        return view('livewire.bill-table', compact('bills', 'billCount', 'has_filters'));
    }

    public function hasFilters()
    {
        return !empty($this->search);
    }

    public function resetFilters()
    {
        $this->reset('search');
        $this->resetPage();
    }
}
