<?php

namespace App\Services;

use App\Models\Log;

class LogService
{
    public function addLogData($type, $user, $item = 0)
    {
        Log::create([
            'type' => $type,
            'user_id' => $user,
            'item_id' => $item,
        ]);
    }
}
