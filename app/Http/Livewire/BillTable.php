<?php

namespace App\Http\Livewire;

use App\Models\LegiScan\Bill;
use App\Traits\Livewire\WithPerPagePagination;
use Livewire\Component;

class BillTable extends Component
{
    use WithPerPagePagination;

    protected $queryString = [
        'search' => ['initial' => null, 'as' => 'q'],
    ];

    public $state_id;
    public $search = null;

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function query()
    {
        return Bill::query()
            ->when($this->state_id,
                fn($query) => $query->where('state_id', $this->state_id)
            )
        ;
    }
    public function applyFilters($query)
    {
        return $query
            ->when($this->search,
                fn($query) => $query
                    ->where(
                        fn($query) => $query
                            ->where('title', 'like', '%'.$this->search.'%')
                            ->orWhere('description', 'like', '%'.$this->search.'%')
                )
            )
        ;
    }

    public function render()
    {
        $bill_count = $this->query()->count();
        $bills = $this->applyPagination(
            $this->applyFilters($this->query()->orderByDesc('status_date'))
        );

        $has_filters = $this->hasFilters();

        return view('livewire.bill-table', compact('bills', 'bill_count', 'has_filters'));
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
