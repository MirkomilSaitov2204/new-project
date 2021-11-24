<?php

namespace Application\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RollbackMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:reset-new';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rollback all database migrations';

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
    public function handle()
    {
        $this->info(">>>> Create Dadatabse !!! ----");

        if($this->confirm('Do you want to continue? (Yes|no)[no]',true)){

            Artisan::call('migrate:reset --path=/app/Infrastructure/Database/Migrations/*');

            $this->info('Successfully installed');
            return;

        }
    }
}
