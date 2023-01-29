<?php

namespace App\Http\Livewire;

use App\Helpers\BookmarkToggle;
use App\Models\LegiScan\Bill;
use App\Traits\Livewire\WithPerPagePagination;
use Livewire\Component;

class BillTable extends Component
{
    use WithPerPagePagination;

    //region Properties

    protected $queryString = [
        'search' => ['initial' => null, 'as' => 'q'],
    ];

    public $group;

    public $scope;

    public $search = null;

    //endregion

    //region Methods

    public function mount()
    {
        $this->pageSize = 5;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function query()
    {
        return Bill::query()
            ->when($this->group->chosenState(), function ($query) {
                $query->where('state_id', $this->group->chosenState()->id);
            })
            ->whereHas('session', function ($query) {
                return $query->where('year_start', $this->group->chosenYear())
                           ->orWhere('year_end', $this->group->chosenYear());
            })
            ->orderByDesc('created');
    }

    public function applyFilters($query)
    {
        return $query
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query
                        ->where('bill_number', 'like', '%' . $this->search . '%')
                        ->orWhere('title', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%')
                        ->orWhereHas('pendingCommittee', function ($query) {
                            $query->where('committee_name', 'like', '%' . $this->search . '%');
                        })
                        ->orWhereHas('sponsors', function ($query) {
                            $query
                                ->whereHas('person', function ($query) {
                                    $query->where('name', 'like', '%' . $this->search . '%');
                                })
                                ->whereHas('type', function ($query) {
                                    $query->where('sponsor_type_desc', 'Primary Sponsor');
                                });
                        });
                });
            });
    }

    public function render()
    {
        $bills = $this->applyPagination(
            $this->applyFilters(
                $this->query()->orderByDesc('status_date')
            )
        );

        return view('livewire.bill-table')
            ->withBills($bills)
            ->withBillCount($this->query()->count())
            ->withScope($this->scope);
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

    public function toggleBookmark(Bill $bill)
    {
        // Bookmark bill for topic
        // -----------------------
        // Null => Show
        // Hide => Show
        // Show => Clear

        $toggle = app(BookmarkToggle::class);

        $bookmark = $toggle->getBookmark($bill, $this->scope);
        if (is_null($bookmark)) {
            return $toggle->up($bill, $this->scope);
        }

        if ($bookmark->direction === false) {
            $toggle->clear($bill, $this->scope);

            return $toggle->up($bill, $this->scope);
        }

        return $toggle->clear($bill, $this->scope);
    }

    public function toggleHide(Bill $bill)
    {
        // Hide bill for topic
        // -------------------
        // Null => Hide
        // Show => Hide
        // Hide => Clear

        $toggle = app(BookmarkToggle::class);

        $bookmark = $toggle->getBookmark($bill, $this->scope);
        if (is_null($bookmark)) {
            return $toggle->down($bill, $this->scope);
        }

        if ($bookmark->direction === true) {
            $toggle->clear($bill, $this->scope);

            return $toggle->down($bill, $this->scope);
        }

        return $toggle->clear($bill, $this->scope);
    }

    //endregion
}
