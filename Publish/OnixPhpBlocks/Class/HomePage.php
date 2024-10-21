<?php

namespace App\Onix\Blocks;

use Mariojgt\Onix\Helpers\BaseOnixBlocks;

class HomePage extends BaseOnixBlocks
{
    public string $template = 'starter';
    public string $componentId = 'home-page-example-01';
    public string $label = 'homepage example 01';
    public string $mediaPath = 'home-page-example-01-media';
    public string $contentPath = 'home-page-example-01';
    public string $category = 'onix-starter';
}
