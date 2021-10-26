<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    function vistaPrueba() {
        
        return view('hello');
    }
}
