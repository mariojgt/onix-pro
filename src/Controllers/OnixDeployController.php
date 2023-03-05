<?php

namespace Mariojgt\Onix\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mariojgt\Onix\Model\OnixPage;
use Mariojgt\Onix\Model\OnixBlock;
use App\Http\Controllers\Controller;
use Mariojgt\Onix\Model\OnixSetting;

class OnixDeployController extends OnixController
{
    /**
     * @return [blade view]
     */
    public function index(Request $request)
    {
        return view('onix::content.deploy.index');
    }
}
