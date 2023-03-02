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
          'formData.title'        => 'required',
          'formData.slug'         => 'required|unique:onix_pages,slug',
          'data'                  => 'required',
          'preview'               => 'required'
        ]);

        $page                   = new OnixPage();
        $page->title            = $validatedData['formData']['title'];
        $page->slug             = isset($validatedData['formData']['slug']) ? Str::slug($validatedData['formData']['slug'], '-') : Str::slug($validatedData['formData']['title'], '-');
        $page->content          = json_encode($validatedData['data']);
        $page->preview          = $validatedData['preview'];
        $page->save();

        return response()->json([
            'message' => 'Page created',
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
