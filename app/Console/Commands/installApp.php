<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class installApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:app';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the application by running migrations and seeding the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('migrate:fresh');
        $this->call('db:seed');
        $this->call('serve');
        
        $this->info('Application installed successfully!');
    }
}
