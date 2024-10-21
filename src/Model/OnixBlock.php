<?php

namespace Mariojgt\Onix\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class OnixBlock extends OnixBase
{
    public function template()
    {
        return $this->hasOne(OnixTemplate::class, 'id', 'template_id');
    }
}
