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

class OnixTemplateController extends OnixController
{
    /**
     * @return [blade view]
     */
    public function index(Request $request)
    {
        $templates = OnixTemplate::all();
        return view('onix::content.template.index', compact('templates'));
    }

    /**
     * @param Request $request
     *
     * @return [blade view]
     */
    public function edit(Request $request, OnixTemplate $template)
    {
        $request->validate([
            'name'  => 'required',
            'slug'   => 'required|unique:onix_templates,slug,' . $template->id
        ]);

        $template->name  = $request->name;
        $template->slug   = Str::slug($request->slug, '-');
        $template->use_manifest = $request->use_manifest == 'on' ? 1 : 0;
        $template->css_file     = $request->css_path;
        $template->js_file      = $request->js_path;
        $template->save();

        return redirect()->back()->with('info', 'Page edited');
    }

    /**
     * @param Request $request
     *
     * @return [blade view]
     */
    public function create(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'slug'   => 'required|unique:onix_templates,slug'
        ]);
        $template               = new OnixTemplate();
        $template->name         = $request->name;
        $template->slug         = Str::slug($request->slug, '-');
        $template->use_manifest = $request->use_manifest == 'on' ? 1 : 0;
        $template->css_file     = $request->css_path;
        $template->js_file      = $request->js_path;
        $template->save();

        return redirect()->back()->with('info', 'Page edited');
    }

    public function delete(Request $request, OnixTemplate $template)
    {
        $template->delete();

        return redirect()->back()->with('info', 'Page deleted');
    }
}
