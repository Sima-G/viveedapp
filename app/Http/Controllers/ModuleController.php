<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed
use App\Setting;

class ModuleController extends Controller
{
    public function modulist(){
        $modules = Setting::Select('*')->get();
        return view('backend.pages.modules', compact('modules'));
    }
}
