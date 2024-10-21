<?php
namespace Mariojgt\Onix\Database\Seeders;

use Illuminate\Database\Seeder;
use Mariojgt\Onix\Model\OnixSetting;

/**
 *
 */
class OnixSettingsSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run(): void
    {
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
    }
}
