<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bookmark;
use App\Models\LegiScan\Bill;
use App\Models\UpDownVote;
use App\Traits\Livewire\WithPerPagePagination;

class BillTable extends Component
{
    use WithPerPagePagination;

    #region Properties

    protected $queryString = [
        'search' => ['initial' => null, 'as' => 'q'],
    ];

    public $group;
    public $scope;

    public $search = null;

    #endregion

    #region Methods

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
            ->when(
                $this->group->chosenState(),
                fn ($query) => $query->where('state_id', $this->group->chosenState()->id)
            )
            ->whereHas('session', function($query) {
                return $query->where('year_start', $this->group->chosenYear())
                           ->orWhere('year_end', $this->group->chosenYear());
            })
            ->orderByDesc('created')
            ;
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

    // Need:
    // - Get vote count for each bill
    // - Get bookmark status (null, up, down)

    // public function toggleUpVote(Bill $bill)
    // {
    //     // Find bill, and vote up or clear
    //     // Up   => Clear
    //     // Down => Up
    //     // Null => Up

    //     $current_direction = UpDownVote::userVote($bill)->direction ?? null;

    //     return $current_direction === true
    //          ? UpDownVote::userVoteClear($bill)
    //          : UpDownVote::userVoteUp($bill);
    // }

    // public function toggleDownVote(Bill $bill)
    // {
    //     // Find bill, and vote down or clear
    //     // Down => Clear
    //     // Up   => Down
    //     // Null => Down

    //     $current_direction = UpDownVote::userVote($bill)->direction ?? null;

    //     return $current_direction === false
    //          ? UpDownVote::userVoteClear($bill)
    //          : UpDownVote::userVoteUp($bill);
    // }

    public function toggleBookmark(Bill $bill)
    {
        // Bookmark bill for topic
        // -----------------------
        // Null => Show
        // Hide => Show
        // Show => Clear

        $bookmark = $bill->bookmark($this->scope);

        if (is_null($bookmark))
        {
            return Bookmark::up($bill, $this->scope);
        }

        if ($bookmark->direction === false)
        {
            Bookmark::clear($bill, $this->scope);
            return Bookmark::up($bill, $this->scope);
        }

        return Bookmark::clear($bill, $this->scope);
    }

    public function toggleHide(Bill $bill)
    {
        // Hide bill for topic
        // -------------------
        // Null => Hide
        // Show => Hide
        // Hide => Clear

        $bookmark = $bill->bookmark($this->scope);

        if (is_null($bookmark))
        {
            return Bookmark::down($bill, $this->scope);
        }

        if ($bookmark->direction === true)
        {
            Bookmark::clear($bill, $this->scope);
            return Bookmark::down($bill, $this->scope);
        }

        return Bookmark::clear($bill, $this->scope);
    }

    #endregion
}
