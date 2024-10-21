<?php

namespace Mariojgt\Onix\Commands;

use Artisan;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Mariojgt\Onix\Model\OnixTemplate;
use Mariojgt\Onix\Database\Seeders\OnixSettingsSeeder;
use Mariojgt\Onix\Database\Seeders\OnixTemplateSeeder;

class InstallTemplate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:template {template?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command will install Onix template';

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
        // get the template value
        $template = $this->argument('template');

        if ($template === null) {
            // Read all the zip file on the template folder
            $templates = [];
            $files = File::files(public_path('templates'));
            foreach ($files as $file) {
                $templates[] = str_replace('.zip', '', $file->getFilename());
            }

            // reordering the array
            $templates = array_values($templates);
            $this->info('Please select the template you want to install');
            $this->info('----------------------------------------------');
            $template = $this->choice('Select the template', $templates);
        }

        // Unzip the template
        $this->info('Unzipping the template');
        $zip = new \ZipArchive;
        $res = $zip->open(public_path('templates/' . $template . '.zip'));

        if ($res === TRUE) {
            $zip->extractTo(public_path('templates/'));
            $zip->close();
        } else {
            $this->error('Failed to unzip the template');
        }

        // Copy the css and js to public folder
        $this->info('Copying the template assets');
        File::copyDirectory(public_path('templates/' . $template . '/css'), public_path('vendor/Onix/' . $template . '/css'));
        File::copyDirectory(public_path('templates/' . $template . '/js'), public_path('vendor/Onix/' . $template . '/js'));

        // Move the blocks to the blocks folder
        $this->info('Copying the template blocks');
        File::copyDirectory(public_path('templates/' . $template . '/blocks/phpblock/'), app_path('Onix/Blocks/'));

        $this->info('Copying the html template blocks');
        File::copyDirectory(public_path('templates/' . $template . '/blocks/htmlblock/'), resource_path('views/onix/blocks/'));

        $this->info('Copying the block icons');
        File::copyDirectory(public_path('templates/' . $template . '/blocks/media/'), resource_path('views/onix/media/'));

        // Find the seeder TemplateSeeder and run it
        $this->info('Running the template seeder');
        $seeder = public_path('templates/' . $template . '/template.json');
        // Get the class from the $seeder file
        $templateInfo = json_decode(file_get_contents($seeder));


        $this->info('Copying the template assets');
        foreach ($templateInfo->file_copy_paths as $key => $item) {
            File::copyDirectory(public_path($item->from), public_path($item->to));
        }

        OnixTemplate::updateOrCreate([
            'slug' => $templateInfo->template->slug,
        ], [
            'name' => $templateInfo->template->name,
            'slug' => $templateInfo->template->slug,
            'description' => $templateInfo->template->description,
            'css_file' => $templateInfo->template->css_file,
            'js_file' => $templateInfo->template->js_file,
            'use_manifest' => $templateInfo->template->use_manifest,
            'preview_image' => $templateInfo->template->preview_image,
        ]);
    }
}
