<?php

namespace Mariojgt\Onix\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnixPage extends OnixBase
{
    public function template()
    {
        return $this->hasOne(OnixTemplate::class, 'id', 'template_id');
    }
}
