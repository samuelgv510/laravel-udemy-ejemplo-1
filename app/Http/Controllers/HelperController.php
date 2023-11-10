<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;

class HelperController extends Controller
{
    public function inicio()
    {
        $version = Helper::getVersion();
        return view('helper.home', compact('version'));
    }
}
