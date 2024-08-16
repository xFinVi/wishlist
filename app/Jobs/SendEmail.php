<?php

namespace App\Jobs;

use App\Models\Note;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $note;
    /**
     * Create a new job instance.
     */
    public function __construct($note)
    {
        $this->note = $note;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info("Handling SendEmail job for note ID: {$this->note->id}");

        Log::info("Sending notes initiated.");

        $noteUrl = config('app.url') . '/notes/' . $this->note->id;

        $emailContent = "Hello, you've received a new note. View it here: {$noteUrl}";

        Mail::raw($emailContent, function ($message) {
            $message->from('sendnotes@zimfy.co', 'The Sendnotes App')
                ->to($this->note->recipient)
                ->subject('You have a new note from ' . $this->note->user->name);
        });
    }
}
