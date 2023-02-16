<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Services\AuthService;
use Illuminate\Console\Command;

class Admin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new admin';

    /**
     * @var AuthService
     */
    public AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $username = $this->ask('Username');
        $password = $this->secret('Password');
        $result = $this->authService->create($username, $password, 'admin', true);
        return Command::SUCCESS;
    }
}
