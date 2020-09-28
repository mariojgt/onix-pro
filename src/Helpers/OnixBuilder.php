<?php

namespace Mariojgt\Onix\Helpers;

use Mariojgt\Onix\Helpers\HtmlFormater;
use File;

class OnixBuilder
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
            // Call the class to format html
            $format         = new HtmlFormater();
            $formatted_html = $format->HTML($content);

        // add the content to the file
        File::put($path.'onix_'.$fileName, $formatted_html);
    }

    public static function tidyHTML($buffer) {
        // load our document into a DOM object
        $dom = new DOMDocument();
        // we want nice output
        $dom->preserveWhiteSpace = false;
        $dom->loadHTML($buffer);
        $dom->formatOutput = true;
        return($dom->saveHTML());
    }
}
