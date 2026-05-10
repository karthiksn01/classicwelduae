<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendNewsletterJob implements ShouldQueue
{
    use Queueable;

    public $subject;
    public $content;

    /**
     * Create a new job instance.
     */
    public function __construct($subject, $content)
    {
        $this->subject = $subject;
        $this->content = $content;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        \App\Models\Newsletter::whereNotNull('verified_at')
            ->whereNull('unsubscribed_at')
            ->chunk(100, function ($subscribers) {
                foreach ($subscribers as $subscriber) {
                    \Illuminate\Support\Facades\Mail::to($subscriber->email)
                        ->queue(new \App\Mail\NewsletterBroadcastMail($this->subject, $this->content, $subscriber));
                    
                    $subscriber->update([
                        'last_sent_at' => now(),
                        'emails_sent' => $subscriber->emails_sent + 1
                    ]);
                }
            });
    }
}
