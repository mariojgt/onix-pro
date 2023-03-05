<?php

namespace App\Onix\Blocks;

use Mariojgt\Onix\Helpers\BaseOnixBlocks;

class TodoList extends BaseOnixBlocks
{
    public string $componentId = 'todo-list';
    public string $label = 'Todo List';
    public string $mediaPath = 'todo-list-media';
    public string $contentPath = 'todo-list';
    public string $category = 'onix-starter';
}
