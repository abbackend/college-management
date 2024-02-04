<?php

namespace App\Observers;

use App\Models\Result;

class ResultObserver
{
    /**
     * Handle the Result "deleting" event.
     */
    public function deleting(Result $result): void
    {
        $result->marks()->delete();
    }
}
