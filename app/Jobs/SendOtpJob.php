<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\OtpMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendOtpJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $otp;
    public $expiryMinutes;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user, string $otp, int $expiryMinutes = 15)
    {
        $this->user = $user;
        $this->otp = $otp;
        $this->expiryMinutes = $expiryMinutes;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        \Log::info('Attempting to send OTP to: ' . $this->user->email);

        try {
            Mail::to($this->user->email)->send(new OtpMail($this->otp));
            \Log::info('Email sent successfully to: ' . $this->user->email);
        } catch (\Exception $e) {
            \Log::error('Email failed: ' . $e->getMessage());
            $this->fail($e);
        }
    }
}