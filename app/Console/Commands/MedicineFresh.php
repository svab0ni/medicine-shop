<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MedicineFresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'medicine:fresh {--seed}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Restart configuration for whole project.';

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
        $seed = $this->option('seed');

        $this->info('Starting migrations: ');
        $this->call('migrate:fresh');
        $this->info('All tables migrated successfully!');

        if($seed) {
            $this->info('Starting seed: ');
            $this->call('db:seed');
            $this->info('Seeded successfully!');
        }
    }
}
