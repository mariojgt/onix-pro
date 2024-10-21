<?php

namespace Mariojgt\Onix\Commands;

use Artisan;
use Illuminate\Console\Command;
use Mariojgt\Onix\Database\Seeders\OnixSettingsSeeder;
use Mariojgt\Onix\Database\Seeders\OnixTemplateSeeder;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:onix';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command will install Onix package';

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
        // Copy the need file to make the onix pacakge to run
        Artisan::call('vendor:publish', [
            '--provider' => 'Mariojgt\Onix\OnixProvider',
            '--force'    => true,
        ]);

        // Migrate
        Artisan::call('migrate');

        // Call the seeder for the onix settings
        Artisan::call('db:seed', [
            '--class' => OnixSettingsSeeder::class,
            '--force' => true,
        ]);

        Artisan::call('db:seed', [
            '--class' => OnixTemplateSeeder::class,
            '--force' => true,
        ]);

        Artisan::call('install:template luxgamers');

        $this->newLine();
        $this->info('The command was successful!');
    }
}
