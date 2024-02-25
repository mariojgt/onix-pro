<?php

namespace Mariojgt\Onix\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnixBase extends Model
{
    use HasFactory;

    /**
     * This function return the blade file usable path
     * example view($block->blade());
     */
    public function blade()
    {
        $raw = str_replace('.blade.php', '', $this->filepath);
        $raw = str_replace('/', '.', $raw);
        $raw = str_replace('views.', '', $raw);
        return $raw;
    }
}
