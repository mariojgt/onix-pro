<?php

namespace Mariojgt\Onix\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class OnixBuilder extends Controller
{
    public static function savePageFile($content, $fileName, $path = null)
    {
        if ($path == null) {
            $path = resource_path('views/pages/');
        }

        //replace some tring that will not work grapeJs
        $content = str_replace('&quot;', "'", $content);
        $content = str_replace('&#039;', "'", $content);
        $content = str_replace('&gt;', ">", $content);

        // if the folder don't exist will create one
        if (!File::isDirectory($path)) {
            //make the folder
            File::makeDirectory($path, 0777, true, true);
        }

        // add the content to the file
        File::put($path.'onix_'.$fileName, $content);
    }
}
