<?php

namespace Application\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CreateDomain extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crm:domain {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create domain all classes';

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
        $this->info(">>>> All Database is fresh !!! ----");

        $model = ucfirst($this->argument('model'));

        if($this->confirm('Do you want to create a model ? (yes|no)[no]',true)) {
            Artisan::call('make:model App/Domain/'. $model.'/Entities/'.$model);
        }

        if($this->confirm('Do you want to create a Repositories ? (yes|no)[no]',true)) {
            Artisan::call('make:repository App/Domain/'. $model.'/Repositories/'.$model.'Repository');
        }

    }
}
