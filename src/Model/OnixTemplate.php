<?php

namespace Mariojgt\Onix\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
