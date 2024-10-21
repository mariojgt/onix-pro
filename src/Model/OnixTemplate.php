<?php

namespace Mariojgt\Onix\Model;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OnixTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'css_file',
        'js_file',
        'preview_image',
        'use_manifest'
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($template) {
            // Create a new folder at the public path for the template
            $path = public_path('vendor/Onix/' . $template->slug);
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
        });
    }

    public function getCssFiles()
    {
        $basePath = config('onix.editor_base_path') . '/' . $this->slug;

        // If the template is not using the manifest file we going to get the css and js files from the database
        $css = explode(',', $this->css_file);
        foreach ($css as $key => $item) {
            // remove any white space
            $item = preg_replace('/\s+/', '', $item);
            if (Str::startsWith($item, 'http') || Str::startsWith($item, 'https')) {
                $cssFiles[] = $item;
            } else {
                $cssFiles[] = url($basePath . '/' . $item);
            }
        }
        return $cssFiles;
    }

    public function getJsFiles()
    {
        $basePath = config('onix.editor_base_path') . '/' . $this->slug;

        // If the template is not using the manifest file we going to get the css and js files from the database
        $js = explode(',', $this->js_file);
        foreach ($js as $key => $item) {
            // remove any white space
            $item = preg_replace('/\s+/', '', $item);
            // if start with http we going to use the url as is
            if (Str::startsWith($item, 'http') || Str::startsWith($item, 'https')) {
                $jsFiles[] = $item;
            } else {
                $jsFiles[] = url($basePath . '/' . $item);
            }
        }
        return $jsFiles;
    }

    public function getCssAndJsTag()
    {
        $cssFiles = $this->getCssFiles();
        $jsFiles = $this->getJsFiles();
        $css = '';
        $js = '';
        foreach ($cssFiles as $key => $item) {
            $css .= '<link rel="stylesheet" href="' . $item . '">';
        }
        foreach ($jsFiles as $key => $item) {
            $js .= '<script src="' . $item . '"></script>';
        }
        return [
            'styles' => $css,
            'scripts'  => $js
        ];
    }
}
