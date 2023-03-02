<?php

namespace Mariojgt\Onix\Controllers;

use Illuminate\Http\Request;
use Mariojgt\Onix\Model\OnixPage;
use App\Http\Controllers\Controller;

class OnixController extends Controller
{
    /**
     * @return [blade view]
     */
    public function index()
    {
        $pages = OnixPage::all();

        return view('onix::content.index', compact('pages'));
    }

    /**
     * @return [blade view]
     */
    public function editor(Request $request, $slug = null)
    {
        $page = OnixPage::where('slug', $slug)->first();

        return view('onix::content.editor', compact('page'));
    }

    /**
     * @param Request $request
     *
     * @return [blade view]
     */
    public function store(Request $request)
    {
        // Example how to save data
        dd(Request('data'));
    }

    /**
     * This is a example how you can load the grape js data from a server node i am seeing as a json.
     *
     * @return [json]
     */
    public function load()
    {
        return response()->json([
            'data' => [
                'gjs-html'       => "<section class=\"min-h-screen flex items-center justify-center px-4 bg-white\"><div class=\"max-w-xl w-full rounded-lg shadow-lg p-4 flex md:flex-row flex-col\"><div class=\"flex-1\"><h3 class=\"font-semibold text-lg tracking-wide\">Hi there i am a get or post request that can be loading from a api.<\/h3><p class=\"text-gray-500 my-1\">\n The link will be available for 24 hours. Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Nesciunt, sequi!\n <\/p><\/div><div class=\"md:px-2 mt-3 md:mt-0 items-center flex\"><button type=\"button\" class=\"bg-green-500 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-blue-600\"> Onix v2 Rocks<\/button><\/div><\/div><\/section>",
                'gjs-components' => '[{"tagName":"section","classes":["min-h-screen","flex","items-center","justify-center","px-4","bg-white"],"components":[{"classes":["max-w-xl","w-full","rounded-lg","shadow-lg","p-4","flex","md:flex-row","flex-col"],"components":[{"classes":["flex-1"],"components":[{"tagName":"h3","type":"text","classes":["font-semibold","text-lg","tracking-wide"],"components":[{"type":"textnode","removable":false,"draggable":false,"highlightable":0,"copyable":false,"content":"Hi there i am a get or post request that can be loading from a api.","_innertext":false}]},{"tagName":"p","type":"text","classes":["text-gray-500","my-1"],"components":[{"type":"textnode","content":"\\n The link will be available for 24 hours. Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Nesciunt, sequi!\\n "}]}]},{"classes":["md:px-2","mt-3","md:mt-0","items-center","flex"],"components":[{"type":"button","classes":["bg-green-500","text-white","font-bold","px-4","py-2","text-sm","uppercase","rounded","tracking-wider","focus:outline-none","hover:bg-blue-600"],"attributes":{"type":"button"},"text":" Onix v2 Rocks","components":[{"type":"textnode","content":" Onix v2 Rocks"}]}]}]}]}]',
                'gjs-assets'     => '[]',
                'gjs-css'        => '* { box-sizing: border-box; } body {margin: 0;}',
                'gjs-styles'     => '[]',
            ],
        ]);
    }

    /**
     * Example image loading.
     *
     * @return [json]
     */
    public function imageLoad()
    {
        return response()->json([
            'image' => 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg',
        ]);
    }

    /**
     * Example image saving from grape js to you media library.
     *
     * @param Request $request
     *
     * @return [type]
     */
    public function imageSave(Request $request)
    {
        dd(Request()->all());
    }

    /**
     * Example component loading, for example you can save pre made components for different pages and load them
     * Like this.
     *
     * @return [json]
     */
    public function autoLoadComponent()
    {
        // Example component loading
        return response()->json([
            'data' => [[
                'name'     => 'autoload-footer',
                'category' => 'Autoload',
                'content'  => '
                <footer class="footer footer-center p-10 bg-primary text-primary-content">
                <div>
                  <svg width="50" height="50" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" class="inline-block fill-current"><path d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z"></path></svg>
                  <p class="font-bold">
                    ACME Industries Ltd. <br/>Providing reliable tech since 1992
                  </p>
                  <p>Copyright © 2022 - All right reserved</p>
                </div>
                <div>
                  <div class="grid grid-flow-col gap-4">
                    <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg></a>
                    <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a>
                    <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg></a>
                  </div>
                </div>
              </footer>
              ',
            ]]]);
    }
}
