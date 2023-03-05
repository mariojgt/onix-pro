<?php

namespace Mariojgt\Onix\Commands;

use Artisan;
use Illuminate\Console\Command;
use Mariojgt\Onix\Model\OnixSetting;

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

        // Create the settings or update them
        $onixSetting = OnixSetting::first();
        if ($onixSetting) {
            $onixSetting->delete();
        }
        $onixSetting                   = new OnixSetting();
        $onixSetting->color_primary    = '#000000ff';
        $onixSetting->color_secondary  = '#14213dff';
        $onixSetting->color_tertiary   = '#fca311ff';
        $onixSetting->color_quaternary = '#e5e5e5ff';
        $onixSetting->save();

        $this->newLine();
        $this->info('The command was successful!');
    }
}
