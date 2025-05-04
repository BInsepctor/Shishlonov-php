<?php

namespace App\Observers;

use App\Models\Posts\Post;
use Illuminate\Support\Facades\Log;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        $this->logChange($post, 'created');
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        $this->logChange($post, 'updated');
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        $this->logChange($post, 'deleted');
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }

    protected function logChange(Post $post, string $action)
    {
        $context = [
            'model' => 'Post',
            'id' => $post->id,
            'action' => $action,
        ];

        if ($action === 'updated') {
            $changes = $post->getChanges();
            unset($changes['updated_at']);
            
            if (!empty($changes)) {
                $context['changes'] = [
                    'before' => array_intersect_key($post->getOriginal(), $changes),
                    'after' => $changes
                ];
            } else {
                return;
            }
        }

        Log::channel('model_changes')->info("Post {$action}", $context);
    }
}
