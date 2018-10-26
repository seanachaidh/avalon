<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Hash;

use Illuminate\Console\Command;
use App\User;

class MakeUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:makeuser {name} {email} {password} {--admin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

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
        $usermail = $this->argument('email');
        $username = $this->argument('name');
        $password = $this->argument('password');

        User::create([
            'name' => $username,
            'email' => $usermail,
            'password' => Hash::make($password),
            'admin' => $this->option('admin')
        ]);
    }
}
