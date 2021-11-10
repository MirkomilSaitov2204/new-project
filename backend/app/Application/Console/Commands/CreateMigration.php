<?php

namespace Application\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CreateMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:migration-new {migration}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Example: php artisan make:migration-new users';

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

            $l_migration = strtolower($this->argument('migration'));
            $u_migration = ucfirst($this->argument('migration'));
            Artisan::call('make:migration create_'.$l_migration. '_table --create='.$l_migration. ' --path=/app/Infrastructure/Database/Migrations/'.$u_migration);

            $this->info('Successfully installed');
            return;

        }
    }
}
