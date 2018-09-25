<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class DeactiveUserStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:check';

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

        foreach($users as $user)
        {
            if(date('Y-m-d H:i',strtotime($user->last_login)) < date('Y-m-d',strtotime('-1 weeks'))){
                $user->status = 2;
                $user->save();
            }
        }
    }
}
