<?php

namespace Mariojgt\Onix\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mariojgt\Onix\Model\OnixPage;
use App\Http\Controllers\Controller;

class OnixPageController extends Controller
{
    /**
     * @return [blade view]
     */
    public function index()
    {
        $pages = OnixPage::all();

        return view('onix::content.page.index', compact('pages'));
    }

    /**
     * @return [blade view]
     */
    public function editor(Request $request, $slug = null)
    {
        $page = OnixPage::where('slug', $slug)->first();

        return view('onix::content.page.editor', compact('page'));
    }

    public function delete(Request $request, OnixPage $page)
    {
        $page->delete();

        return redirect()->back()->with('info', 'Page deleted');
    }

    /**
     * @param Request $request
     *
     * @return [blade view]
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug'  => 'required|unique:onix_pages',
        ]);

        $page        = new OnixPage();
        $page->title = $request->title;
        $page->slug  = Str::slug($request->slug, '-');
        $page->save();

        return redirect()->back()->with('success', 'Page created');
    }

    /**
     * @param Request $request
     *
     * @return [blade view]
     */
    public function edit(Request $request, OnixPage $page)
    {
        $request->validate([
            'title' => 'required',
            'slug'  => 'required|unique:onix_pages,slug,' . $page->id,
        ]);

        $page->title = $request->title;
        $page->slug  = Str::slug($request->slug, '-');
        $page->save();

        return redirect()->back()->with('info', 'Page edited');
    }
}
