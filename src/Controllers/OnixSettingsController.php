<?php

namespace Mariojgt\Onix\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mariojgt\Onix\Model\OnixPage;
use Mariojgt\Onix\Model\OnixBlock;
use App\Http\Controllers\Controller;
use Mariojgt\Onix\Model\OnixSetting;

class OnixSettingsController extends Controller
{
    /**
     * @return [blade view]
     */
    public function index(Request $request)
    {
        $settings = OnixSetting::first();

        return view('onix::content.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        // Create the settings or update them
        $onixSetting = OnixSetting::first();
        if (!$onixSetting) {
            $onixSetting = new OnixSetting();
        }
        $onixSetting->color_primary = $request->color_primary;
        $onixSetting->color_secondary = $request->color_secondary;
        $onixSetting->color_tertiary = $request->color_tertiary;
        $onixSetting->color_quaternary = $request->color_quaternary;
        $onixSetting->save();

        return redirect()->back()->with('success', 'Settings updated.');
    }
}
