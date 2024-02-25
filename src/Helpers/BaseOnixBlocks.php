<?php

namespace Mariojgt\Onix\Helpers;

class BaseOnixBlocks
{
    public string $componentId = '';
    public string $label = '';
    public string $category = '';
    // Base path for the media
    public string $mediaBasePath = '';
    public string $contentBasePath = '';
    // Component path
    public string $mediaPath = '';
    public string $contentPath = '';

    public function __construct()
    {
        $this->mediaBasePath   = config('onix.media_path');
        $this->contentBasePath = config('onix.component_path');
    }

    public function getContentBladeHtml()
    {
        return view($this->contentBasePath . '.' . $this->contentPath)->render();
    }

    public function getMediaBladeHtml()
    {
        return view($this->mediaBasePath . '.' . $this->mediaPath)->render();
    }

    public function getBlock()
    {
        return [
            'componentId' => $this->componentId,
            'label'       => $this->label,
            'category'    => $this->category,
            'media'       => $this->getMediaBladeHtml(),
            'content'     => $this->getContentBladeHtml(),
        ];
    }
}
