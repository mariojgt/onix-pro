<?php

namespace Mariojgt\Onix\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OnixContoller extends Controller
{
    public function index()
    {
        return view('onix::content.index');
    }
}
