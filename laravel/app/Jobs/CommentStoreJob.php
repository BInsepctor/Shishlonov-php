<?php

namespace App\Jobs;

use App\Models\Comments\Comment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;


class CommentStoreJob implements ShouldQueue
{
    use Dispatchable, SerializesModels, InteractsWithQueue, Queueable;
    protected $data;
    /**
     * Create a new job instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Comment::create($this->data);
    }
}
