<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Notifications\AccountStatus;
use Illuminate\Notifications\Notifiable;

class BirthdayWise extends Command
{
    use Notifiable;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'birthday-wise';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $users = User::all();

        // dd(date('Y-m-d',strtotime('+1 days')));
        foreach($users as $user)
        {
            if(date('Y-m-d',strtotime($user->created_at)) == date('Y-m-d')){
                dd($user->notify(new AccountStatus($user)));
            }
        }
        
    }
}
