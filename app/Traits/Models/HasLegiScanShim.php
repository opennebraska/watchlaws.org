<?php

namespace App\Traits\Models;

trait HasLegiScanShim
{
    #region Attributes

    public function getIdAttribute()
    {
        return $this->primaryKey;
    }

    #endregion
}
