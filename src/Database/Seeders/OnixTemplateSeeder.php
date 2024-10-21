<?php
namespace Mariojgt\Onix\Database\Seeders;

use Illuminate\Database\Seeder;
use Mariojgt\Onix\Model\OnixTemplate;

/**
 *
 */
class OnixTemplateSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run(): void
    {
        OnixTemplate::create([
            'name' => 'starter',
            'slug' => 'starter',
            'description' => 'default content template',
            'css_file' => 'resources/vendor/Onix/css/app.css',
            'js_file' => 'resources/vendor/Onix/js/app.js',
        ]);
    }
}
