<?php

namespace Mariojgt\Onix\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\OnixComponents\HomePage;
use Mariojgt\Onix\Model\OnixPage;
use Mariojgt\Onix\Model\OnixBlock;
use App\Http\Controllers\Controller;
use Mariojgt\Onix\Controllers\OnixApiController;

class OnixSitePageController extends OnixController
{
    /**
     * @return [blade view]
     */
    public function index(Request $request, $slug = null)
    {
        $page = OnixPage::where('slug', $slug)->firstOrFail();
        if ($page->status == 0) {
            abort(404);
        }
        return view('pages.onix.' . $page->slug);
    }
}
