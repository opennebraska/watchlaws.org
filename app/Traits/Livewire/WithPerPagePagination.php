<?php

namespace App\Traits\Livewire;

use Livewire\WithPagination;

trait WithPerPagePagination
{
    use WithPagination;

    public $pageSize = 5;

    public function applyPagination($query)
    {
        return $query->paginate($this->pageSize)->withQueryString();
    }
}
