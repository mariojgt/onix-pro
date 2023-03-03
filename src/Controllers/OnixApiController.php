<?php

namespace Mariojgt\Onix\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mariojgt\Onix\Model\OnixPage;
use App\Http\Controllers\Controller;

class OnixApiController extends Controller
{
    public function config()
    {
        return response()->json([
            'primaryColor'    => '#0d3b66',
            'secondaryColor'  => '#faf0ca',
            'tertiaryColor'   => '#f4d35e',
            'quaternaryColor' => '#ee964b',
        ]);
    }

    public function savePage(Request $request)
    {
        $validatedData = $request->validate([
          'slug'    => 'required',
          'data'    => 'required',
          'preview' => 'required'
        ]);

        $page                   = OnixPage::where('slug', $validatedData['slug'])->firstOrFail();
        $page->content          = json_encode($validatedData['data']);
        $page->preview          = $validatedData['preview'];
        $page->save();

        return response()->json([
            'message' => 'Your content has been saved!',
        ], 200);
    }

    public function loadPage(Request $request, $slug)
    {
        $page = OnixPage::where('slug', $slug)->firstOrFail();

        return response()->json([
            'page' => $page,
        ], 200);
    }
}
