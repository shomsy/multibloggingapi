<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\SendEmailToAllUsersNotification;
use Illuminate\Console\Command;

class SendEmailToAllUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:allusers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to all users in the system.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        User::whereNotNull('email')
            ->get()->each(function ($user) {
                $user->notify(new SendEmailToAllUsersNotification());
            });
    }
}
