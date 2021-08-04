<?php

namespace Mariojgt\Onix\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OnixContoller extends Controller
{
    /**
     * @return [blade view]
     */
    public function index()
    {
        return view('onix::content.index');
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
     * This is a example how you can load the grape js data from a server node i am seing as a json.
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
     * Example component loading, for example you can save pre made components for diferent pages and load them
     * Like this.
     *
     * @return [json]
     */
    public function autoLoadComponent()
    {
        // Example component loading
        return response()->json([
            'data' => [[
                'name'     => 'autoload01',
                'category' => 'Autoload',
                'content'  => '<div class="inline-block mr-2 mt-2">
                    <button type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-red-500 hover:bg-red-600 hover:shadow-lg">Auto load example 01</button>
                </div>',
            ],
                [
                    'name'     => 'autoload02',
                    'category' => 'Autoload',
                    'content'  => '<!-- This is an example component -->
                <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
                  <div class="relative py-3 sm:max-w-xl sm:mx-auto  flex flex-col">
                    <div class="p-3 mx-auto">
                      <a href="" class="text-2xl uppercase font-bold text-indigo-900 ">Onix is cool</a>
                    </div>
                    <div class="w-30 h-30 border rounded-3xl border-indigo-900 shadow">
                      <img src="https://img.icons8.com/plasticine/200/000000/user-male.png" />
                    </div>
                    <div class="mt-2 mx-auto">
                      <p class="font-mono uppercase text-indigo-700">I am a autoload example</p>
                    </div>
                  </div>
                  <div class=" mx-auto">
                   <i><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                width="48" height="48"
                viewBox="0 0 172 172"
                style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#3498db"><path d="M46.58333,46.58333c0,-11.825 9.675,-21.5 21.5,-21.5h35.83333c11.825,0 21.5,9.675 21.5,21.5h14.33333c0,-19.70833 -16.125,-35.83333 -35.83333,-35.83333h-35.83333c-19.70833,0 -35.83333,16.125 -35.83333,35.83333v40.13333h14.33333z"></path><path d="M16.48333,78.83333l22.93333,30.1l22.93333,-30.1z"></path><g><path d="M125.41667,125.41667c0,11.825 -9.675,21.5 -21.5,21.5h-35.83333c-11.825,0 -21.5,-9.675 -21.5,-21.5h-14.33333c0,19.70833 16.125,35.83333 35.83333,35.83333h35.83333c19.70833,0 35.83333,-16.125 35.83333,-35.83333v-43h-14.33333z"></path><path d="M109.65,93.16667l22.93333,-30.1l22.93333,30.1z"></path></g></g></g></svg></i>
                    </div>
                  </div>
                </div>',
                ],
            ],
        ]);
    }
}
