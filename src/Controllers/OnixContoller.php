<?php

namespace Mariojgt\Onix\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OnixContoller extends Controller
{
    public function index()
    {
        return view('onix::content.index');
    }

    public function store(Request $request)
    {
        dd(Request('data'));
    }

    public function load()
    {
        return response()->json([
            "data" => [
                "gjs-html"       => "<section class=\"min-h-screen flex items-center justify-center px-4 bg-white\"><div class=\"max-w-xl w-full rounded-lg shadow-lg p-4 flex md:flex-row flex-col\"><div class=\"flex-1\"><h3 class=\"font-semibold text-lg tracking-wide\">Hi there i am a server request loading.<\/h3><p class=\"text-gray-500 my-1\">\n The link will be available for 24 hours. Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Nesciunt, sequi!\n <\/p><\/div><div class=\"md:px-2 mt-3 md:mt-0 items-center flex\"><button type=\"button\" class=\"bg-blue-500 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-blue-600\"> Onix v2 Rocks<\/button><\/div><\/div><\/section>",
                "gjs-components" => "[{\"tagName\":\"section\",\"classes\":[\"min-h-screen\",\"flex\",\"items-center\",\"justify-center\",\"px-4\",\"bg-white\"],\"components\":[{\"classes\":[\"max-w-xl\",\"w-full\",\"rounded-lg\",\"shadow-lg\",\"p-4\",\"flex\",\"md:flex-row\",\"flex-col\"],\"components\":[{\"classes\":[\"flex-1\"],\"components\":[{\"tagName\":\"h3\",\"type\":\"text\",\"classes\":[\"font-semibold\",\"text-lg\",\"tracking-wide\"],\"components\":[{\"type\":\"textnode\",\"removable\":false,\"draggable\":false,\"highlightable\":0,\"copyable\":false,\"content\":\"Hi there i am a server request loading.\",\"_innertext\":false}]},{\"tagName\":\"p\",\"type\":\"text\",\"classes\":[\"text-gray-500\",\"my-1\"],\"components\":[{\"type\":\"textnode\",\"content\":\"\\n The link will be available for 24 hours. Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Nesciunt, sequi!\\n \"}]}]},{\"classes\":[\"md:px-2\",\"mt-3\",\"md:mt-0\",\"items-center\",\"flex\"],\"components\":[{\"type\":\"button\",\"classes\":[\"bg-blue-500\",\"text-white\",\"font-bold\",\"px-4\",\"py-2\",\"text-sm\",\"uppercase\",\"rounded\",\"tracking-wider\",\"focus:outline-none\",\"hover:bg-blue-600\"],\"attributes\":{\"type\":\"button\"},\"text\":\" Onix v2 Rocks\",\"components\":[{\"type\":\"textnode\",\"content\":\" Onix v2 Rocks\"}]}]}]}]}]",
                "gjs-assets"     => "[]",
                "gjs-css"        => "* { box-sizing: border-box; } body {margin: 0;}",
                "gjs-styles"     => "[]"
              ]
        ]);
    }
}
