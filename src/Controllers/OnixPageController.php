<?php

namespace Mariojgt\Onix\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\OnixComponents\HomePage;
use Mariojgt\Onix\Model\OnixPage;
use Mariojgt\Onix\Model\OnixBlock;
use App\Http\Controllers\Controller;
use Mariojgt\Onix\Model\OnixTemplate;
use Mariojgt\Onix\Controllers\OnixApiController;

class OnixPageController extends OnixController
{
    /**
     * @return [blade view]
     */
    public function index(Request $request)
    {
        $pages = OnixPage::all();
        $templates = OnixTemplate::all()->pluck('name', 'id');
        return view('onix::content.page.index', compact('pages', 'templates'));
    }

    /**
     * @return [blade view]
     */
    public function editor(Request $request, $slug = null)
    {
        $page = OnixPage::where('slug', $slug)->first();
        $template = $page->template;
        return view('onix::content.page.editor', compact('page', 'template'));
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
            'title'  => 'required',
            'template_id'  => 'required',
            'slug'   => 'required|unique:onix_pages'
        ]);

        $page         = new OnixPage();
        $page->title  = $request->title;
        $page->slug   = Str::slug($request->slug, '-');
        $page->status = $request->status == 'on' ? 1 : 0;
        $page->template_id = $request->template_id;
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
            'title'  => 'required',
            'slug'   => 'required|unique:onix_pages,slug,' . $page->id
        ]);

        $page->title  = $request->title;
        $page->slug   = Str::slug($request->slug, '-');
        $page->status = $request->status == 'on' ? 1 : 0;
        $page->save();

        return redirect()->back()->with('info', 'Page edited');
    }
}
