<?php

namespace Mariojgt\Onix\Commands;

use Artisan;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateOnixBlock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'onix:block';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command will create a new Onix block';

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
        // Ask for the block id
        $componentId = $this->ask('What is the id of the block?');
        // Ask for the block name
        $label = $this->ask('What is the name of the block?');
        // Ask for the block content location
        $mediaPath = $this->ask('What is the media path filename?(example: home-media)');
        // Ask for the block media location
        $contentPath = $this->ask('What is the content filename? (example: home))');
        // Ask for the category
        $category = $this->ask('What is the category of the block?');
        // Ask for the class name
        $className = $this->ask('What is the class name of the block?');
        $className = Str::studly($className);
        $replace = [
            'variables' => [
                '{{componentId}}',
                '{{label}}',
                '{{mediaPath}}',
                '{{contentPath}}',
                '{{category}}',
                '{{className}}',
            ],
            'values' => [
                $componentId,
                $label,
                $mediaPath,
                $contentPath,
                $category,
                $className,
            ]
        ];

        // Create the default media file
        $this->loadStubFileAndSave(
            'BaseBlockClass',
            app_path('Onix/Blocks'),
            $className,
            '.php',
            $replace
        );

        // Create the default media file
        $this->loadStubFileAndSave(
            'BaseBlockMedia',
            resource_path('views/onix/media'),
            Str::kebab($mediaPath),
            '.blade.php'
        );

        // Create the default content file
        $this->loadStubFileAndSave(
            'BaseBlockContent',
            resource_path('views/onix/blocks'),
            Str::kebab($contentPath),
            '.blade.php'
        );

        $this->newLine();
        $this->info('The Block was created');
    }

    private function loadStubFileAndSave($stubFile, $saveFilePath, $fileName, $fileExtension = '.php', $replace = null)
    {
        File::isDirectory($saveFilePath) or File::makeDirectory($saveFilePath, 0777, true, true);

        $stub = file_get_contents(__DIR__ . '../../Stubs/' . $stubFile . '.stub');
        if (!empty($replace)) {
            $stub = str_replace($replace['variables'], $replace['values'], $stub);
        }
        file_put_contents($saveFilePath . '/' . $fileName . $fileExtension, $stub);
    }
}
