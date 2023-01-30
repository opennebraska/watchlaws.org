<?php

namespace App\Http\Livewire\Workspace\Bill;

use App\Models\Group\Workspace;
use App\Models\Group\Workspace\Topic;
use App\Models\LegiScan\Bill;
use Livewire\Component;

class AssignTopics extends Component
{
    public Workspace $workspace;

    public Bill $bill;

    public $topicsAssigned = [];

    public function mount()
    {
        $this->topicsAssigned = $this->bill->topics->pluck('id');
    }

    public function render()
    {
        return view('livewire.workspace.bill.assign-topics');
    }

    public function update()
    {
        $this->bill->updateAssignedTopics(Topic::find($this->topicsAssigned), $this->workspace);

        $this->emit('assignedTopicsUpdated', $this->bill->id)->up();
    }

    public function cancel()
    {
        $this->emit('assignedTopicsCancelled', $this->bill->id)->up();
    }
}
