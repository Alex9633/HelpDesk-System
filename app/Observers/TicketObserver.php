<?php

namespace App\Observers;

use App\Models\Ticket;
use App\Models\TicketHistory;
use Illuminate\Support\Facades\Auth;

class TicketObserver
{
    public function updated(Ticket $ticket): void
    {
        $changes = $ticket->getChanges();
        $original = $ticket->getOriginal();

        foreach ($changes as $field => $newValue) {
            if (in_array($field, ['updated_at'])) {
                continue;
            }

            $oldValue = $original[$field] ?? null;

            if ($oldValue != $newValue) {
                TicketHistory::create([
                    'ticket_id' => $ticket->id,
                    'user_id' => Auth::id(),
                    'field' => $field,
                    'old_value' => $oldValue,
                    'new_value' => $newValue,
                ]);
            }
        }
    }
}
