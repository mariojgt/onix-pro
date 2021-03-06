<?php

namespace Mariojgt\Onixpro\Commands;

use File;
use Illuminate\Console\Command;

class Republish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'republish:onixpro';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command will copy the resource files from back to the package';

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
        $bar = $this->output->createProgressBar(5);
        $bar->start();

        // Normal onix pro
        // First we move the resources where we keep the css and js files
        $targetFolderResource = resource_path('vendor/Onixpro/');
        $destitionResource = __DIR__ . '/../../Publish/Resource/Onixpro';
        File::copyDirectory($targetFolderResource, $destitionResource);
        $bar->advance(); // Little Progress bar

        // Onix Pro public
        // Now we move the already compiles files from the public
        $targetFolderPublic = public_path('vendor/Onixpro/');
        $destitionPublic = __DIR__ . '/../../Publish/Public/Onixpro';
        File::copyDirectory($targetFolderPublic, $destitionPublic);
        $bar->advance(); // Little Progress bar

        // Onix widget
        // First we move the resources where we keep the css and js files
        $targetFolderResource = resource_path('vendor/Onix/');
        $destitionResource = __DIR__ . '/../../Publish/Resource/Onix';
        File::copyDirectory($targetFolderResource, $destitionResource);
        $bar->advance(); // Little Progress bar

        // Now we move the already compiles files from the public
        $targetFolderPublic = public_path('vendor/Onix/');
        $destitionPublic = __DIR__ . '/../../Publish/Public/Onix';
        File::copyDirectory($targetFolderPublic, $destitionPublic);
        $bar->advance(); // Little Progress bar

        // Now we move the lang file
        // $targetFolderPublic = resource_path('lang/');
        // $destitionPublic    = __DIR__ . '/../../Publish/Lang';
        // File::copyDirectory($targetFolderPublic, $destitionPublic);
        // $bar->advance(); // Little Progress bar

        // Now we copy the webpack file
        $targetFolderWebPack = base_path('webpack.mix.js');
        $destitionWebPack = __DIR__ . '/../../Publish/Npm/webpack.mix.js';
        File::copy($targetFolderWebPack, $destitionWebPack);
        $bar->advance(); // Little Progress bar

        // Now we copy the tailwind file
        $targetFolderWebPack = base_path('tailwind.config.js');
        $destitionWebPack = __DIR__ . '/../../Publish/Npm/tailwind.config.js';
        File::copy($targetFolderWebPack, $destitionWebPack);
        $bar->advance(); // Little Progress bar

        // Now we copy the package.json file
        $targetFolderWebPack = base_path('package.json');
        $destitionWebPack = __DIR__ . '/../../Publish/Npm/package.json';
        File::copy($targetFolderWebPack, $destitionWebPack);
        $bar->advance(); // Little Progress bar

        $bar->finish(); // Finish the progress bar
        $this->newLine();
        $this->info('The command was successful!');
    }
}
