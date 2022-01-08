<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
use App\Mail\SendEmaiTest;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $details;

    public function __construct($detail)
    {
        $this->details = $detail;
    }
    
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new SendEmaiTest();

        Mail::to($this->details['email'])->send($email);
    }
}
