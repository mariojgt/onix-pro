<?php

namespace Mariojgt\Onix\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mariojgt\Onix\Model\OnixPage;
use Mariojgt\Onix\Model\OnixBlock;
use App\Http\Controllers\Controller;
use Mariojgt\Onix\Model\OnixTemplate;

class OnixBlockController extends OnixController
{
    /**
     * @return [blade view]
     */
    public function index(Request $request)
    {
        $block = OnixBlock::all();
        $templates = OnixTemplate::all()->pluck('name', 'id');

        return view('onix::content.block.index', compact('block', 'templates'));
    }

    /**
     * @return [blade view]
     */
    public function editor(Request $request, $slug = null)
    {
        $block = OnixBlock::where('slug', $slug)->first();

        return view('onix::content.block.editor', compact('block'));
    }

    public function delete(Request $request, OnixBlock $block)
    {
        $block->delete();

        return redirect()->back()->with('info', 'Block deleted');
    }

    /**
     * @param Request $request
     *
     * @return [blade view]
     */
    public function store(Request $request)
    {
        $request->validate([
            'componentId' => 'required',
            'label'       => 'required',
            'media'       => 'required',
            'category'    => 'required',
            'slug'        => 'required|unique:onix_blocks',
            'template_id'  => 'required',
        ]);

        $block                 = new OnixBlock();
        $block->template_id    = $request->template_id;
        $block->componentId    = $request->componentId;
        $block->label          = $request->label;
        $block->slug           = Str::slug($request->slug, '-');
        $block->media          = $request->media;
        $block->category       = $request->category;
        $block->component_sync = $request->component_sync == 'on' ? 1 : 0;
        $block->status         = $request->status == 'on' ? 1 : 0;
        $block->save();


        return redirect()->back()->with('success', 'Page created');
    }

    /**
     * @param Request $request
     *
     * @return [blade view]
     */
    public function edit(Request $request, OnixBlock $block)
    {
        $request->validate([
            'componentId' => 'required',
            'label'       => 'required',
            'media'       => 'required',
            'category'    => 'required',
            'slug'        => 'required|unique:onix_blocks,slug,' . $block->id
        ]);

        $block->componentId    = $request->componentId;
        $block->label          = $request->label;
        $block->slug           = Str::slug($request->slug, '-');
        $block->media          = $request->media;
        $block->category       = $request->category;
        $block->component_sync = $request->component_sync == 'on' ? 1 : 0;
        $block->status         = $request->status == 'on' ? 1 : 0;
        $block->save();

        return redirect()->back()->with('info', 'Block edited');
    }
}
