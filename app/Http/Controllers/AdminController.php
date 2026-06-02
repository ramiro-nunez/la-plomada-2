<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function panel(Request $request) { 
        
        return view('panel-control');
    }

    public function crear(Request $request) { 
        
        return view('crear-articulo');
    }
}
