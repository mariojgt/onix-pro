<?php

namespace Mariojgt\Onix\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mariojgt\Onix\Model\OnixPage;
use Mariojgt\Onix\Model\OnixBlock;
use App\Http\Controllers\Controller;
use Mariojgt\Onix\Model\OnixSetting;

class OnixApiController extends OnixController
{
    /*
    |--------------------------------------------------------------------------
    | SETTINGS
    |--------------------------------------------------------------------------
    */
    public function config()
    {
        $settings = OnixSetting::first();
        return response()->json([
            'primaryColor'    => $settings->color_primary,
            'secondaryColor'  => $settings->color_secondary,
            'tertiaryColor'   => $settings->color_tertiary,
            'quaternaryColor' => $settings->color_quaternary,
        ]);
    }

    public function getSiteStyles()
    {
        $cssFiles = [];
        $jsFiles  = [];
        if (config('onix.use_cdn')) {
            $cssFiles = config('onix.editor_css_cdn');
            $jsFiles  = config('onix.editor_js_cdn');
        } else {
            $basePath = config('onix.editor_base_path');
            // Find the manifest file so we can get the css and js files
            $manifest = json_decode(file_get_contents(public_path($basePath . '/manifest.json')), true);
            foreach ($manifest as $key => $item) {
                // Check if the string have any of the css file from the array from config
                if (Str::contains($key, config('onix.editor_css'))) {
                    $cssFiles[] = url($basePath . '/' . $item['file']);
                }
                // Check if the string have any of the js file from the array from config
                if (Str::contains($key, config('onix.editor_js'))) {
                    $jsFiles[] = url($basePath . '/' . $item['file']);
                }
            }
        }

        return response()->json([
            'css' => $cssFiles,
            'js'  => $jsFiles,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | PAGES
    |--------------------------------------------------------------------------
    */

    public function savePage(Request $request)
    {
        $validatedData = $request->validate([
          'slug'         => 'required',
          'data'         => 'required',
          'preview'      => 'required',
          'just_content' => 'required'
        ]);

        $page          = OnixPage::where('slug', $validatedData['slug'])->firstOrFail();
        $page->content = json_encode($validatedData['data']);
        $page->preview = $validatedData['preview'];
        $page->html    = $validatedData['just_content'];
        $page->save();

        return response()->json([
            'message' => 'Your content has been saved!',
        ], 200);
    }

    public function loadPage(Request $request, $slug)
    {
        $page = OnixPage::where('slug', $slug)->firstOrFail();

        return response()->json([
            'data' => $page,
        ], 200);
    }


    /*
    |--------------------------------------------------------------------------
    | BLOCKS
    |--------------------------------------------------------------------------
    */

    public function loadBlocks(Request $request)
    {
        // First we going to scan the path App\OnixComponents and get all the components to array
        $blocks = [];
        $path       = app_path('Onix\Blocks');
        // Scan the classed files adn get the block data
        foreach (scandir($path) as $file) {
            if (in_array($file, ['.', '..'])) {
                continue;
            }
            // now instantiate the anonymous class
            $className = pathinfo($file, PATHINFO_FILENAME);
            $class     = 'App\\Onix\\Blocks\\' . $className;
            $instance  = new $class();
            $blocks[] = $instance->getBlock();
        }

        $onixDataBaseBlocks = OnixBlock::all();

        foreach ($onixDataBaseBlocks as $key => $item) {
            $blocks[] = [
                'componentId'    => $item->componentId,
                'label'          => $item->label,
                'slug'           => $item->slug,
                'category'       => $item->category,
                'media'          => $item->media,
                'content'        => $item->block_data,
                'component_sync' => $item->component_sync,
            ];
        }

        return response()->json([
            'blocks' => $blocks,
        ], 200);
    }

    public function saveBlock(Request $request)
    {
        $validatedData = $request->validate([
          'slug'            => 'required',
          'data'            => 'required',
          'preview_no_body' => 'required'
        ]);

        $page             = OnixBlock::where('slug', $validatedData['slug'])->firstOrFail();
        $page->content    = json_encode($validatedData['data']);
        $page->block_data = $validatedData['preview_no_body'];
        $page->save();

        return response()->json([
            'message' => 'Your content has been saved!',
        ], 200);
    }

    public function loadBlock(Request $request, $slug)
    {
        $block = OnixBlock::where('slug', $slug)->firstOrFail();

        return response()->json([
            'data' => $block,
        ], 200);
    }
}
