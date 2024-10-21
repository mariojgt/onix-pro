<?php

namespace App\Onix\Blocks;

use Mariojgt\Onix\Helpers\BaseOnixBlocks;

class Navbar extends BaseOnixBlocks
{
    public string $template = 'starter';
    public string $componentId = 'navbar';
    public string $label = 'navbar';
    public string $mediaPath = 'mavbar-media';
    public string $contentPath = 'navbar';
    public string $category = 'onix-starter';
}
