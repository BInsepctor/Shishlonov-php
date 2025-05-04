<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user)
    {
        $this->logChange($user, 'created');
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user)
    {
        $this->logChange($user, 'updated');
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user)
    {
        $this->logChange($user, 'deleted');
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }

    protected function logChange(User $user, string $action)
    {
        $context = [
            'model' => 'User',
            'id' => $user->id,
            'action' => $action,
        ];

        if ($action === 'updated') {
            $changes = $user->getChanges();
            unset($changes['updated_at']);
            
            if (!empty($changes)) {
                $context['changes'] = [
                    'before' => array_intersect_key($user->getOriginal(), $changes),
                    'after' => $changes
                ];
            } else {
                return; 
            }
        }

        Log::channel('model_changes')->info("User {$action}", $context);
    }
}
